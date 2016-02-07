/**
 * @author Rizart Dokollari
 * @since 20/12/2015
 */
function pNotifyMessage(notification) {
	new PNotify({
		title: notification.level === 'error' ? 'Error.' : 'Info.',
		text: notification.message,
		type: notification.level,
		animation: "slide",
		animate_speed: "slow",
		hide: 'true',
		shadow: 'true',
		delay: 3000,
		mouse_reset: true
	});
}

$(function () {
	PNotify.prototype.options.styling = "fontawesome";

	var notifications = jQuery.parseJSON($('input[name=notifications]').val());

	for (var index in notifications) {
		new pNotifyMessage(notifications[index]);
	}
});
