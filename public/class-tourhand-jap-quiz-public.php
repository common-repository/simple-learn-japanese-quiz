<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://knowhalim.com
 * @since      1.0.0
 *
 * @package    Tourhand-jap-quiz
 * @subpackage Tourhand-jap-quiz/public
 */

/**
 * @package    Tourhand-jap-quiz
 * @subpackage Tourhand-jap-quiz/public
 * @author     Halim <contact@knowhalim.com>
 */
class Tourhand_jap_quiz_Public {


	private $plugin_name;


	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tourhand-jap-quiz-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 */
	public function enqueue_scripts() {

		/**
		 * enter your scripts here
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tourhand-jap-quiz-public.js', array( 'jquery' ), $this->version, false );

	}

}


function tourhand_get_quesans(){
	$question = array();
	$set=array();
        $set['question']="What is the Japanese word for \"hello\"?";
        $set['options']="ohayou|konnichiwa|konbanwa|sayonara";
        $set['answer']="konnichiwa";
        $question[]=$set;
        $set=array();
        $set['question']="Which of the following is the correct way to write \"sushi\" in Japanese?";
        $set['options']="寿司|すし|鮨|Both A and C";
        $set['answer']="すし";
        $question[]=$set;
        $set=array();
        $set['question']="Which of the following is the correct order for writing a person\'s name in Japanese?";
        $set['options']="Last name, first name|First name, last name|Middle name, first name, last name|Last name, middle name, first name";
        $set['answer']="First name, last name";
        $question[]=$set;
        $set=array();
        $set['question']="Which of the following is the correct way to say \"thank you\" in Japanese?";
        $set['options']="Sumimasen|Arigatou|Onegaishimasu|Gomen nasai";
        $set['answer']="Arigatou";
        $question[]=$set;
        $set=array();
        $set['question']=" Which of the following is the correct way to say \"excuse me\" in Japanese?";
        $set['options']="Sumimasen|Arigatou|Onegaishimasu|Gomen nasai";
        $set['answer']="Sumimasen";
        $question[]=$set;
        $set=array();
        $set['question']="What is the Japanese word for \"goodbye\"?";
        $set['options']="Ohayou|Konnichiwa|Sayonara|Hajimemashite";
        $set['answer']="Sayonara";
        $question[]=$set;
        $set=array();
        $set['question']="Which of the following is the correct way to say \"I love you\" in Japanese?";
        $set['options']="Suki desu|Aishiteru|Daisuki desu|Ai shiteimasu";
        $set['answer']="Aishiteru";
        $question[]=$set;
        $set=array();
        $set['question']="Which of the following is the correct way to say \"yes\" in Japanese?";
        $set['options']="Hai|Iie|Wakarimasen|Ogenki desu ka";
        $set['answer']="Hai";
        $question[]=$set;
        $set=array();
        $set['question']="Which of the following is the correct way to say \"no\" in Japanese?";
        $set['options']="Hai|Iie|Wakarimasen|Ogenki desu ka";
        $set['answer']="Iie";
        $question[]=$set;
        $set=array();
        $set['question']="Which of the following is the correct way to say \"please\" in Japanese?";
        $set['options']="Sumimasen|Arigatou|Onegaishimasu|Gomen nasai";
        $set['answer']="Onegaishimasu";
        $question[]=$set;
        
	
	return $question;
}


function tourhand_get_scoring(){
	$scoring = array();
	
	
    $set=array();
	$set['score']=0;
	$set['remark']="All your answers were wrong. Please try again.";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=1;
	$set['remark']="You need to learn more. Take up Japanese class!";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=2;
	$set['remark']="You need to learn more. Take up Japanese class!";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=3;
	$set['remark']="You need to learn more. Enrol for a Japanese lesson!";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=4;
	$set['remark']="You need to learn more. Enrol for a Japanese lesson!";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=5;
	$set['remark']="You score quite fair.";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=6;
	$set['remark']="Not bad, but you can do better.";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=7;
	$set['remark']="Not bad.";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=8;
	$set['remark']="Not so bad, you know some Japanese";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=9;
	$set['remark']="Good that you know some Japanese";
	$scoring[]=$set;
        
    $set=array();
	$set['score']=10;
	$set['remark']="Great! You know basic Japanese!";
	$scoring[]=$set;
        
	
	return $scoring;
}

add_shortcode('simplelearnjapanesequiz_display_form','tourhand_show_fun_quiz');

function tourhand_show_fun_quiz(){
	add_action('wp_footer','tourhand_ajax_fun_quiz');
	
	$quiz=tourhand_get_quesans();
	
	$simplelearnjapanesequiz_settings_options = get_option( 'simplelearnjapanesequiz_settings_option_name' ); // Array of All Options
	$introduction_text= $simplelearnjapanesequiz_settings_options['introduction_text_0']; // Introduction Text
	$start_button_text = $simplelearnjapanesequiz_settings_options['start_button_text_eg_start_now_1']; // Start Button Text (eg. Start Now)
	$next_button_text = $simplelearnjapanesequiz_settings_options['next_button_text_eg_next_2']; // Next Button Text (eg. Next)
	$submit_button_text = $simplelearnjapanesequiz_settings_options['submit_button_text_eg_get_your_result_3']; // Submit Button Text (eg. Get your result)
	$after_quiz_message = $simplelearnjapanesequiz_settings_options['after_quiz_message_4']; // After Quiz Message
	$headline_for_quiz = $simplelearnjapanesequiz_settings_options['headline_for_quiz_5']; // Headline For Quiz
	$support_developer = $simplelearnjapanesequiz_settings_options['support_developer_by_displaying_credits_6']; // Support developer by displaying credits?
	
	$introduction_text = $introduction_text;
	$startbtn_text = $start_button_text;
	$nextbtn_text = $next_button_text;
	$submitbtn_text = $submit_button_text;
	$result_message = $after_quiz_message;
	$headline_text = $headline_for_quiz;
	$showcredits = $support_developer;
	$credits = '<span id="tourhand_pg_credit">Powered by <a href="https://tourhand.com">Simple Learn Japanese Quiz</a></span>';
	
	
	$question_form = "<div class='tourhand_qn_form'><h2>".$headline_text."</h2>";
	
	
	$question_form .= "<div class='tourhand_the_question'>";
	$qn='';
	$options = '';
	$ct=1;
	foreach ($quiz as $item){
		$qns .="<div class='tourhand_qn' id='tourhand_qn_".$ct."'>".$item['question']."</div>";
		$options .= "<div class='tourhand_option_list' id='tourhand_option_".$ct."'>";
		$getopts = explode("|",$item['options']);
		foreach ($getopts as $opt){
			$options .= "<input type='radio' value='".$opt."' name='qn_".$ct."'> ".$opt."<br>";
		}
		$options .= "</div>";
		$ct++;
	}
	$question_form .= $qns;
	$question_form .= "</div>";
	$question_form .= "<div class='tourhand_the_answer'>".$options."</div>";
	$question_form .= "<div class='tourhand_loading_bar'><img src='".plugin_dir_url( __FILE__ ) . "745.gif' /></div>";
	
	$question_form .= "<div class='tourhand_start_message'>";
	$question_form .= "<div class='tourhand_start_text'>".$introduction_text."</div>";
	$question_form .= "<div class='tourhand_start_btn' id='tourhand_start_quiz'>".$startbtn_text."</div>";
	$question_form .= "</div>";
	
	$question_form .= "<div id='tourhand_next' class='tourhand_nextbtn' >".$nextbtn_text."</div>";
	$question_form .= "<div id='tourhand_submit_quiz' class='tourhand_submitbtn' >".$submitbtn_text."</div>";
	$question_form .= "<div id='tourhand_result_txt' class='tourhand_result_txt' ></div>";
	$question_form .= "<div id='tourhand_end_txt' class='tourhand_end' >".$result_message."</div>";
	
	$question_form .= "</div>";
	if ($showcredits=="yes"){
		$question_form .= $credits;
	}

	return $question_form;
}


add_action('wp_ajax_nopriv_tourhand_generate_result', 'tourhand_submit_quiz');
add_action('wp_ajax_tourhand_generate_result', 'tourhand_submit_quiz');


function tourhand_submit_quiz(){

	$q = tourhand_get_quesans();
	$t = count($q);
	$score =0;
	$scoring =tourhand_get_scoring();
	for ($i=1;$i<=$t;$i++){
		$ans = sanitize_text_field($_POST['tourhand_ans_'.$i]);
		if ($q[$i-1]['answer']==$ans){
			$score++;
		}
	}
	$remark = $scoring[$score]['remark'];
	
	$return=array(
	"status"=>"success",
	"score"=>$score,
	"full_score"=>$t,
	"remarks"=>$remark
	);
	echo json_encode($return);
	die();
		
}

function tourhand_ajax_fun_quiz(){
	?>
<script>
var tourhand_qn_on = 0; //Halim: This is the initial qn
var tourhand_qn_ans = []; //Halim: This is the array for answers
	
	jQuery('.tourhand_qn').hide();
	jQuery('.tourhand_option_list').hide();
	jQuery('.tourhand_nextbtn').hide();
	jQuery('.tourhand_submitbtn').hide();
	jQuery('.tourhand_end').hide();
	jQuery('.tourhand_result_txt').hide();
	jQuery('.tourhand_loading_bar').hide();

jQuery("#tourhand_start_quiz").click(function(e){
	jQuery('.tourhand_loading_bar').show();
	jQuery('.tourhand_the_answer').show();
	tourhand_qn_on++;
	<?php
	$tqn=tourhand_get_quesans();
	?>
		jQuery('.tourhand_start_message').hide();
		//Hide all questions but display the intended one
		jQuery('.tourhand_qn').hide();
		jQuery("#tourhand_qn_"+tourhand_qn_on).show();
	

		//Hide all options but display the intended one
		jQuery('.tourhand_option_list').hide();
		jQuery("#tourhand_option_"+tourhand_qn_on).show();
	
    jQuery('.tourhand_loading_bar').hide();
});
									 
jQuery('.tourhand_option_list>input').click(function(){
	if (tourhand_qn_on < <?php echo count($tqn); ?>) {
		jQuery("#tourhand_next").fadeIn();
	}else{
		
		jQuery("#tourhand_submit_quiz").fadeIn();
	}
});
jQuery("#tourhand_next").click(function(e){
	jQuery("#tourhand_next").hide();
	jQuery('.tourhand_loading_bar').show();
	
	
	tourhand_qn_ans[tourhand_qn_on] = jQuery('input[name="qn_'+tourhand_qn_on+'"]:checked').val();
	tourhand_qn_on++;
	
	jQuery('.tourhand_start_message').hide();
	//Hide all questions but display the intended one
	jQuery('.tourhand_qn').hide();
	jQuery("#tourhand_qn_"+tourhand_qn_on).show();

	//Hide all options but display the intended one
	jQuery('.tourhand_option_list').hide();
	jQuery("#tourhand_option_"+tourhand_qn_on).show();
	
    jQuery('.tourhand_loading_bar').hide();
	
});
	
jQuery("#tourhand_submit_quiz").click(function(e){
	var thisbtn=jQuery(this);

    jQuery('.tourhand_loading_bar').show();
	jQuery('.tourhand_qn').hide();
	jQuery('.tourhand_option_list').hide();
	thisbtn.attr("disabled", true);
	thisbtn.fadeOut();
	<?php
	$ctn=1;
	$code='';
	$stringify ='';
	foreach ($tqn as $qn){
		$code .= 'var tourhand_qn_ans_'.$ctn.' = jQuery("input[name=\'qn_'.$ctn.'\']:checked").val(); 
	';
		$stringify .='"tourhand_ans_'.$ctn.'" : tourhand_qn_ans_'.$ctn.',';
		$ctn++;
	}
	$stringify = rtrim($stringify,',');
	echo esc_attr($code);
	?>
    jQuery('.tourhand_loading_bar').show();
	var data = { 'action':'tourhand_generate_result',<?php echo esc_attr($stringify); ?>};

    jQuery.ajax({
		url : '<?php echo admin_url( 'admin-ajax.php' ); ?>',
		type: "POST",
	  	data,
		dataType: "json",
		success: function(response) {
			jQuery('.tourhand_loading_bar').hide();
		   	
			if (response.status=="success"){
				thisbtn.attr("disabled", false);
				thisbtn.hide();
				jQuery('.tourhand_result_txt').fadeIn();
				jQuery('.tourhand_result_txt').html("You score "+response.score+" out of "+response.full_score+"!<br><span>Remarks: "+response.remarks+"</span>");
				jQuery('.tourhand_end').fadeIn();
			}else{
				thisbtn.attr("disabled", false);
				thisbtn.text("Try Again");
                thisbtn.fadeIn();
			}
		}
		
    });

}
);
	

</script>
<?php
}