// Au click de souris, déclenche l'animation et envoi vers la rubrique
const pagesMenus = document.getElementsByClassName('img_rubrique');

for(let i = 0; i < pagesMenus.length; i++) {
	pagesMenus[i].addEventListener('click', function() {
		pagesMenus[i].classList.toggle('img_to_menu');
		let rubrique = this.id;
		switch (rubrique) {
  		case 'boole':
    		window.setTimeout(function() {
					location.href="index.php?target=rubrique&id=1"
				}, 500);
    		break;
    	case 'algorithmie':
   			window.setTimeout(function() {
					location.href="algorithmie.ctrl.php"
				}, 500);
    		break;
    	case 'uml':
    		window.setTimeout(function() {
  		  	pagesMenus[i].classList.remove('img_to_menu');
					open("../window_menu_uml.php", "", "width=500, height=350, top=300, left=750 toolbar=no, location=yes, directories=no, menubar=no, scrollbars=yes, status=yes, resizable=no")
				}, 500);
    		break;
    	case 'model_bdd':
  		  window.setTimeout(function() {
  		  	pagesMenus[i].classList.remove('img_to_menu');
					open("../window_menu_model_bdd.php", "", "width=500, height=350, top=300, left=750 toolbar=no, location=yes, directories=no, menubar=no, scrollbars=yes, status=yes, resizable=no")
				}, 500);
    		break;
    	default:
		}
	});
}
