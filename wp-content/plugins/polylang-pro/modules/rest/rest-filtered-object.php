<?php
/**
 * @package Polylang-Pro
 */

/**
 * Abstract class to allow to filter posts, terms or comments in the REST API
 *
 * @since 2.6.9
 */
abstract class PLL_REST_Filtered_Object {
	/**
	 * @var PLL_Model
	 */
	public $model;

	/**
	 * Object type, typically 'post' or 'term', defined by the child class
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Array of arrays with post types or taxonomies as keys and options as values
	 * See constructor
	 *
	 * @var array
	 */
	protected $content_types;

	/**
	 * REST request parameters stored for internal usage.
	 *
	 * @var array
	 */
	protected $params;

	/**
	 * Constructor
	 *
	 * @since 2.6.9
	 *
	 * @param object $rest_api      Instance of PLL_REST_API
	 * @param array  $content_types Array of arrays with content type as keys and options as values
	 *                              The possible options are:
	 *                              filters:      whether to filter queries, defaults to true
	 */
	public function __construct( &$rest_api, $content_types ) {
		$this->model = &$rest_api->model;

		$this->content_types = $content_types;

		add_filter( 'rest_dispatch_request', array( $this, 'get_params' ), 10, 2 );
		add_filter( 'rest_request_after_callbacks', array( $this, 'reset_params' ) );

		foreach ( $content_types as $type => $args ) {
			$args = wp_parse_args( $args, array_fill_keys( array( 'filters' ), true ) );

			if ( $args['filters'] ) {
				add_filter( "rest_{$type}_collection_params", array( $this, 'collection_params' ) );
			}
		}
	}

	/**
	 * Get the rest field type for a content type
	 *
	 * @since 2.3.11
	 *
	 * @param string $type Post type or taxonomy name
	 * @return string REST API field type
	 */
	protected function get_rest_field_type( $type ) {
		return $type;
	}

	/**
	 * Stores the request parameters to use, for example when filtering queries.
	 *
	 * @since 2.6.9
	 *
	 * @param mixed           $null    Not used, generally null.
	 * @param WP_REST_Request $request Request used to generate the response.
	 * @return mixed
	 */
	public function get_params( $null, $request ) {
		$this->params = $request->get_params();
		return $null;
	}

	/**
	 * Reset the params
	 *
	 * @since 2.6.9
	 *
	 * @param object $response Result to send to the client. Usually a WP_REST_Response or WP_Error.
	 * @return object
	 */
	public function reset_params( $response ) {
		unset( $this->params );
		return $response;
	}

	/**
	 * Exposes the 'lang' param for posts and terms
	 *
	 * @since 2.2
	 *
	 * @param array $query_params JSON Schema-formatted collection parameters.
	 * @return array
	 */
	public function collection_params( $query_params ) {
		$query_params['lang'] = array(
			'description' => __( 'Limit results to a specific language.', 'polylang-pro' ),
			'type'        => 'string',
			'enum'        => $this->model->get_languages_list( array( 'fields' => 'slug' ) ),
		);
		return $query_params;
	}
}
