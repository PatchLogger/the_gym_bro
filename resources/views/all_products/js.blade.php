<!--===============================================================================================-->
<script src="product/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="product/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="product/vendor/bootstrap/js/popper.js"></script>
	<script src="product/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="product/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="product/vendor/daterangepicker/moment.min.js"></script>
	<script src="product/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="product/vendor/slick/slick.min.js"></script>
	<script src="product/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="product/vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="product/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="product/vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="product/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="product/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="product/js/main.js"></script>
	<script src="home/assets/js/jquery-2.1.3.min.js"></script>
	<script src="home/assets/js/jquery-2.1.3.min.js"></script>
<script>
	
document.addEventListener("DOMContentLoaded", function () {
    var quantityInput = document.getElementById("quantityInput");
    var myForm = document.getElementById("myForm");

    myForm.addEventListener("submit", function (event) {
        var value = parseInt(quantityInput.value);
        if (isNaN(value) || value < 1) {
            event.preventDefault(); // Prevent form submission
            alert("The quantity must be greater than or equal to 1.");
        }
    });
});
</script>
	<script>
		// Get references to the menu toggle link and dropdown content
		const menuToggle = document.getElementById("menuToggle");
		const dropdownContent = document.getElementById("dropdownContent");

		// Add a click event listener to the menu toggle link
		menuToggle.addEventListener("click", function() {
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	</script>
	<script>
		const navButtons = document.querySelectorAll('.catagorybtn');

		function handleNavButtonClick(event) {
			// Remove the 'active' class from all buttons
			navButtons.forEach((button) => {
				button.classList.remove('active');
			});

			// Add the 'active' class to the clicked button
			event.currentTarget.classList.add('active');
		}

		// Add click event listeners to the navigation buttons
		navButtons.forEach((button) => {
			button.addEventListener('click', handleNavButtonClick);
		});
		// Add click event listeners to the navigation buttons
		navButtons.forEach((button) => {
			button.addEventListener('click', handleNavButtonClick);
		});
	</script>
	<script>
		// JavaScript to read the category parameter from the URL
		document.addEventListener("DOMContentLoaded", function() {
			const urlParams = new URLSearchParams(window.location.search);
			const category = urlParams.get('category');
			const defaultButton = document.getElementById("All_Products");
			// Click the corresponding category button
			if (category) {
				const categoryButton = document.getElementById(category);
				if (categoryButton) {
					categoryButton.click();
				}
			} else {
				defaultButton.click();
			}
		});
	</script>
	<script>
		const Treadmills = document.getElementById("Treadmills");
		const Home_Gyms = document.getElementById("Home_Gyms");
		const Adjustable_Dumbbells = document.getElementById("Adjustable_Dumbbells");
		const All_Products = document.getElementById("All_Products");

		Adjustable_Dumbbells.addEventListener("click", function() {
			const newParams = new URLSearchParams({
				category: "Adjustable_Dumbbells"
			}).toString();
			history.pushState(null, "", "?" + newParams);
		});

		Home_Gyms.addEventListener("click", function() {
			const newParams = new URLSearchParams({
				category: "Home_Gyms"
			}).toString();
			history.pushState(null, "", "?" + newParams);
		});

		Treadmills.addEventListener("click", function() {
			const newParams = new URLSearchParams({
				category: "Treadmills"
			}).toString();
			history.pushState(null, "", "?" + newParams);
		});

		All_Products.addEventListener("click", function() {
			const currentUrl = new URL(window.location.href);

			// Remove the 'category' parameter (or any other parameters you want to remove)
			currentUrl.searchParams.delete('category');

			// Update the URL without the removed parameters
			window.history.replaceState({}, '', currentUrl.toString());
		});
	</script>