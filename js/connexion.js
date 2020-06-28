$(document).ready(function() {
	$("#buttonConnexion").click(function(e) {
		e.preventDefault();
		$(this).addClass('spinner-border text-primary');
		let email = $("#email").val();
		let password = $("#password").val();
		$.post(
				"ajax-connection.php",
				{
					email: email,
					password: password
				},
				function(data) {
					if(data == 1) {
						window.location = "creation.php";
					} else {
						$("#error-connexion").attr('display','block');
						$("#error-connexion").css('display','block');
					}
				}
			)
	});
	$("#error-connexion").click(function(){
		$(this).css('display','none');
	})
});