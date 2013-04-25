<?php

/**
 * Class for the 'display_point' parser hooks.
 * 
 * @since 0.7
 * 
 * @file Maps_DisplayPoint.php
 * @ingroup Maps
 * 
 * @author Jeroen De Dauw
 */
class MapsDisplayPoint extends ParserHook {
	
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
		return array( 'display_point', 'display_points', 'display point', 'display points' );
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
		global $egMapsMapWidth, $egMapsMapHeight, $egMapsDefaultServices, $egMapsDefaultTitle, $egMapsDefaultLabel, $egMapsDefaultMapCentre;
		
		$params = MapsMapper::getCommonParameters();
		
		$params['mappingservice']->setDefault( $egMapsDefaultServices['display_point'] );
		$params['mappingservice']->addManipulations( new MapsParamService( 'display_point' ) );
		$params['mappingservice']->setDescription( wfMsg( 'maps-displaypoints-par-mappingservice' ) );
		
		$params['zoom']->addDependencies( 'coordinates', 'mappingservice' );
		$params['zoom']->addManipulations( new MapsParamZoom() );
		$params['zoom']->setDescription( wfMsg( 'maps-displaypoints-par-zoom' ) );
		
		$params['coordinates'] = new ListParameter( 'coordinates', $type === ParserHook::TYPE_FUNCTION ? ';' : "\n" );
		$params['coordinates']->addAliases( 'coords', 'location', 'address', 'addresses', 'locations' );
		$params['coordinates']->addCriteria( new CriterionIsLocation( $type === ParserHook::TYPE_FUNCTION ? '~' : '|' ) );
		$params['coordinates']->addManipulations( new MapsParamCoordSet( $type === ParserHook::TYPE_FUNCTION ? '~' : '|' ) );		
		$params['coordinates']->addDependencies( 'mappingservice', 'geoservice' );
		$params['coordinates']->setDescription( wfMsg( 'maps-displaypoints-par-coordinates' ) );
		
		$params['centre'] = new Parameter(
			'centre',
			Parameter::TYPE_STRING,
			false,
			array( 'center' ),
			array(
				new CriterionIsLocation(),
			)			
		);
		$params['centre']->setDescription( wfMsg( 'maps-displaypoints-par-centre' ) );
		$params['centre']->setDoManipulationOfDefault( false );
		
		$params['title'] = new Parameter(
			'title',
			Parameter::TYPE_STRING,
			$egMapsDefaultTitle
		);
		$params['title']->setDescription( wfMsg( 'maps-displaypoints-par-title' ) );
		
		$params['label'] = new Parameter(
			'label',
			Parameter::TYPE_STRING,
			$egMapsDefaultLabel,
			array( 'text' )
		);
		$params['label']->setDescription( wfMsg( 'maps-displaypoints-par-label' ) );
		
		$params['icon'] = new Parameter(
			'icon',
			Parameter::TYPE_STRING,
			'', // TODO
			array(),
			array(
				New CriterionNotEmpty()
			)
		);	
		$params['icon']->setDescription( wfMsg( 'maps-displaypoints-par-icon' ) );
		
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
		return array( 'coordinates' );
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
		// Get the instance of the service class. 
		$service = MapsMappingServices::getServiceInstance( $parameters['mappingservice'], $this->getName() );
		
		// Get an instance of the class handling the current parser hook and service. 
		$mapClass = $service->getFeatureInstance( 'display_point' );
		
		return $mapClass->getMapHtml( $parameters, $this->parser, $this->frame );
	}
	
	/**
	 * Returns the parser function otpions.
	 * @see ParserHook::getFunctionOptions
	 * 
	 * @since 0.7
	 * 
	 * @return array
	 */
	protected function getFunctionOptions() {
		return array(
			'noparse' => true,
			'isHTML' => true
		);
	}	

	/**
	 * @see ParserHook::getDescription()
	 * 
	 * @since 0.7.4
	 */
	public function getDescription() {
		return wfMsg( 'maps-displaypoint-description' );
	}		
	
}