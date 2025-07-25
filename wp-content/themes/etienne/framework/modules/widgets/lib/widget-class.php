<?php
/**
 * Abstract class that makes it easy to create widgets. It has generic methods for generating form and updating widgets
 * Classes that extend this class needs to implement setParams method where $params property will be populated
 *
 * Class EtienneElatedClassWidget
 */
abstract class EtienneElatedClassWidget extends WP_Widget {
    /**
     * Widget parameters that form will be generated from
     * @var
     */
    protected $params;

    /**
     * @return mixed
     */
    abstract protected function setParams();

    /**
     * Generate widget form based on $params attribute
     *
     * @param array $instance
     *
     * @return null
     */
    public function form($instance) {
        if(is_array($this->params) && count($this->params)) {
            foreach($this->params as $param_array) {
                $param_name    = $param_array['name'];
                ${$param_name} = isset($instance[$param_name]) ? esc_attr($instance[$param_name]) : '';
            }

            foreach($this->params as $param) {
                switch($param['type']) {
                    case 'textfield':
                        ?>
                        <p>
                            <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo esc_html($param['title']); ?>:</label>
                            <input class="widefat" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" type="text" value="<?php echo esc_attr(${$param['name']}); ?>"/>
                            <?php if(!empty($param['description'])) : ?>
                                <span class="eltdf-field-description"><?php echo esc_html($param['description']); ?></span>
                            <?php endif; ?>
                        </p>
                        <?php
                        break;
	                case 'textarea':
		                ?>
		                <p>
			                <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo esc_html($param['title']); ?>:</label>
			                <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>"><?php echo esc_attr(${$param['name']}); ?></textarea>
			                <?php if(!empty($param['description'])) : ?>
				                <span class="eltdf-field-description"><?php echo esc_html($param['description']); ?></span>
			                <?php endif; ?>
		                </p>
		                <?php
		                break;
                    case 'dropdown':
                        ?>
                        <p>
                            <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo esc_html($param['title']); ?>:</label>
                            <?php if(isset($param['options']) && is_array($param['options']) && count($param['options'])) { ?>
                                <select class="widefat" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>">
                                    <?php foreach($param['options'] as $param_option_key => $param_option_val) {
                                        $option_selected = '';
                                        if(${$param['name']} == $param_option_key) {
                                            $option_selected = 'selected';
                                        }
                                        ?>
                                        <option <?php echo esc_attr($option_selected); ?> value="<?php echo esc_attr($param_option_key); ?>"><?php echo esc_attr($param_option_val); ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                            <?php if(!empty($param['description'])) : ?>
                                <span class="eltdf-field-description"><?php echo esc_html($param['description']); ?></span>
                            <?php endif; ?>
                        </p>

                        <?php
                        break;
	                case 'colorpicker':
		                ?>
		                <p class="eltdf-widget-color-picker">
			                <label for="<?php echo esc_attr($this->get_field_id($param['name'])); ?>"><?php echo esc_html($param['title']); ?>:</label>
			                <input class="widefat eltdf-color-picker-field" id="<?php echo esc_attr($this->get_field_id($param['name'])); ?>" name="<?php echo esc_attr($this->get_field_name($param['name'])); ?>" type="text" value="<?php echo esc_attr(${$param['name']}); ?>"/>
			                <?php if(!empty($param['description'])) : ?>
				                <span class="eltdf-field-description"><?php echo esc_html($param['description']); ?></span>
			                <?php endif; ?>
		                </p>
		                <?php
		                break;
                }
            }
        } else { ?>
            <p><?php esc_html_e('There are no options for this widget.', 'etienne'); ?></p>
        <?php }
    }
	
	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		foreach ( $this->params as $param ) {
			$param_name = $param['name'];
			$param_type = $param['type'];
			
			if ( $param_type === 'textarea' && current_user_can( 'unfiltered_html' ) ) {
				$instance[ $param_name ] = $new_instance[ $param_name ];
			} else {
				$instance[ $param_name ] = sanitize_text_field( $new_instance[ $param_name ] );
			}
		}
		
		return $instance;
	}
}

?>