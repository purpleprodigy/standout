(
	function ( $, window, document, undefined ) {

		var $questions = $( '.faq-question' ),
			$answers = $( '.faq-answer' ),
			$icons = $( '.faq-icon' );
		iconClassname = {
			open: 'ion-chevron-up',
			close: 'ion-chevron-down'
		};

		function init() {
			closeAnswersOnPageLoad();
			clickEventHandler();
		}

		function closeAnswersOnPageLoad() {
			$.each( $questions, function ( index, element ) {
				var $question = $( element );
				if ( isAnswerToBeClosed( $question ) ) {
					var $answer = getAnswer( index );
					$answer.hide();
				}
			} );
		}

		function isAnswerToBeClosed( $question ) {
			var $openIcon = $question.find( '.ion-chevron-down' );

			return $openIcon.length > 0;
		}

		function clickEventHandler() {
			$questions.click( function () {
				var index = $questions.index( this ),
					$answer = getAnswer( index ),
					$icon = getIcon( index );

			if ( isAnswerShowing( $answer ) ) {
				closeAnswer( $answer, $icon );
			} else {
				openAnswer( $answer, $icon );
			}
		}

		);
}

function getAnswer( index ) {
	return $( $answers[index] );
}

function getIcon( index ) {
	return $( $icons[index] );
}

function isAnswerShowing( $element ) {
	return $element.is( ':visible' );
}

function openAnswer( $answerElement, $iconElement ) {
	$answerElement.slideDown();
	changeIconClassname( true, $iconElement );
}

function closeAnswer( $answerElement, $iconElement ) {
	$answerElement.slideUp();
	changeIconClassname( false, $iconElement );
}

function changeIconClassname( isOpening, $iconElement ) {
	var removeClassname = isOpening ? iconClassname.close : iconClassname.open,
		addClassname = isOpening ? iconClassname.open : iconClassname.close;

	$iconElement
		.removeClass( removeClassname )
		.addClass( addClassname );
}

$( document ).ready( function () {
	init();
} );

}

(
	jQuery, window, document
)
)
;
