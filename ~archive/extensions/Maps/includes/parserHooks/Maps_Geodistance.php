<?php

/**
 * Class for the 'geodistance' parser hooks, which can
 * calculate the geographical distance between two points.
 * 
 * @since 0.7
 * 
 * @file Maps_Geodistance.php
 * @ingroup Maps
 * 
 * @author Jeroen De Dauw
 */
class MapsGeodistance extends ParserHook {
	
	/**
	 * No LST in pre-5.3 PHP *sigh*.
	 * This is to be refactored as soon as php >=5.3 becomes acceptable.
	 */
	public static function staticMagic( array &$magicWords, $langCode ) {
		$className = __CLASS__;
		$instance = new $className();
		return $instance->magic( $magicWords, $langCode );
	}
	
	/**
	 * No LST in pre-5.3 PHP *sigh*.
	 * This is to be refactored as soon as php >=5.3 becomes acceptable.
	 */	
	public static function staticInit( Parser &$wgParser ) {
		$className = __CLASS__;
		$instance = new $className();
		return $instance->init( $wgParser );
	}	
	
	/**
	 * Gets the name of the parser hook.
	 * @see ParserHook::getName
	 * 
	 * @since 0.7
	 * 
	 * @return string
	 */
	protected function getName() {
		return 'geodistance';
	}
	
	/**
	 * Returns an array containing the parameter info.
	 * @see ParserHook::getParameterInfo
	 * 
	 * @since 0.7
	 * 
	 * @return array
	 */
	protected function getParameterInfo( $type ) {
		global $egMapsDistanceUnit, $egMapsDistanceDecimals, $egMapsAvailableGeoServices, $egMapsDefaultGeoService; 
		
		$params = array();
		
		$params['location1'] = new Parameter(
			'location1',
			Parameter::TYPE_STRING,
			null,
			array( 'from' ),
			array(
				new CriterionIsLocation(),
			)			
		);
		$params['location1']->addDependencies( 'mappingservice', 'geoservice' );
		$params['location1']->setDescription( wfMsg( 'maps-geodistance-par-location1' ) );
		
		$params['location2'] = new Parameter(
			'location2',
			Parameter::TYPE_STRING,
			null,
			array( 'to' ),
			array(
				new CriterionIsLocation(),
			)			
		);
		$params['location2']->addDependencies( 'mappingservice', 'geoservice' );			
		$params['location2']->setDescription( wfMsg( 'maps-geodistance-par-location2' ) );
		
		$params['unit'] = new Parameter(
			'unit',
			Parameter::TYPE_STRING,
			$egMapsDistanceUnit,
			array(),
			array(
				new CriterionInArray( MapsDistanceParser::getUnits() ),
			)
		);
		$params['unit']->addManipulations( new ParamManipulationFunctions( 'strtolower' ) );
		$params['unit']->setDescription( wfMsg( 'maps-geodistance-par-unit' ) );
		
		$params['decimals'] = new Parameter(
			'decimals',
			Parameter::TYPE_INTEGER,
			$egMapsDistanceDecimals
		);			
		$params['decimals']->setDescription( wfMsg( 'maps-geodistance-par-decimals' ) );
		
		$params['mappingservice'] = new Parameter(
			'mappingservice', 
			Parameter::TYPE_STRING,
			'', // TODO
			array(),
			array(
				new CriterionInArray( MapsMappingServices::getAllServiceValues() ),
			)
		);
		$params['mappingservice']->addManipulations( new ParamManipulationFunctions( 'strtolower' ) );
		$params['mappingservice']->setDescription( wfMsg( 'maps-geodistance-par-mappingservice' ) );
		
		$params['geoservice'] = new Parameter(
			'geoservice', 
			Parameter::TYPE_STRING,
			$egMapsDefaultGeoService,
			array( 'service' ),
			array(
				new CriterionInArray( $egMapsAvailableGeoServices ),
			)
		);
		$params['geoservice']->addManipulations( new ParamManipulationFunctions( 'strtolower' ) );	
		$params['geoservice']->setDescription( wfMsg( 'maps-geodistance-par-geoservice' ) );
		
		return $params;
	}
	
	/**
	 * Returns the list of default parameters.
	 * @see ParserHook::getDefaultParameters
	 * 
	 * @since 0.7
	 * 
	 * @return array
	 */
	protected function getDefaultParameters( $type ) {
		return array( 'location1', 'location2', 'unit', 'decimals' );
	}
	
	/**
	 * Renders and returns the output.
	 * @see ParserHook::render
	 * 
	 * @since 0.7
	 * 
	 * @param array $parameters
	 * 
	 * @return string
	 */
	public function render( array $parameters ) {
		if ( MapsGeocoders::canGeocode() ) {
			$start = MapsGeocoders::attemptToGeocode( $parameters['location1'], $parameters['geoservice'], $parameters['mappingservice'] );
			$end = MapsGeocoders::attemptToGeocode( $parameters['location2'], $parameters['geoservice'], $parameters['mappingservice'] );
		} else {
			$start = MapsCoordinateParser::parseCoordinates( $parameters['location1'] );
			$end = MapsCoordinateParser::parseCoordinates( $parameters['location2'] );
		}
		
		if ( !$start || !$end ) {
			// The locations should be valid when this method gets called.
			throw new Exception( 'Attempt to find the distance between locations of at least one is invalid' );			
		}

		return MapsDistanceParser::formatDistance( MapsGeoFunctions::calculateDistance( $start, $end ), $parameters['unit'], $parameters['decimals'] );
	}

	/**
	 * @see ParserHook::getDescription()
	 * 
	 * @since 0.7.4
	 */
	public function getDescription() {
		return wfMsg( 'maps-geodistance-description' );
	}	
	
}
