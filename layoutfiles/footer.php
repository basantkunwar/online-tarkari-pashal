
   <footer class="bg-success text-white mt-5 py-5 pt-4 pb-3">
  <div class="container">
    <div class="row text-center text-md-start">

      <!-- Logo + About -->
      <div class="col-md-4 mb-3">
        <h4>Online Tarkari Pashal</h4>
        <p>
          Fresh vegetables, fruits, and groceries delivered
          to your home directly from local farmers. 
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4 mb-3">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
          <li><a href="all_product.php" class="text-white text-decoration-none">All Products</a></li>
          <li><a href="about.php" class="text-white text-decoration-none">About Us</a></li>
          <li><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
<div class="col-md-4 mb-3">
  <h5>Contact</h5>
<p class="mb-1">📍 dhangadhi, Nepal</p>
<p class="mb-1">📞 +977 9742511433</p>
 <p class="mb-1">✉ basantkunwar1433@gmail.com</p>
 <a href="https://www.facebook.com/share/1HQtKdn6Yi/?mibextid=wwXIfr"><button class="btn btn-success"> <i class="bi bi-facebook"></i></a> </button>
<a href="https://www.facebook.com/share/1HQtKdn6Yi/?mibextid=wwXIfr"><button class="btn btn-success"><i class="bi bi-messenger"></i></a> </button>
<a href="https://www.tiktok.com/@cr7chari?_r=1&_t=ZS-95EBiwkFRrh"><button class="btn btn-success"><i class="bi bi-youtube"></i></a> </button>
<a href="https://www.tiktok.com/@cr7chari?_r=1&_t=ZS-95EBiwkFRrh"><button class="btn btn-success"><i class="bi bi-tiktok"></i></a> </button>
      </div>

    </div>

    <hr class="border-light">

    <!-- Copyright -->
    <div class="text-center">
      <p class="mb-0">2025 Online Tarkari Pashal • All Rights Reserved</p>
    </div>
  </div>
</footer>
</div>

<!---logoutmenu--->



<script>
  const images = [
    "../images/photorealistic-sustainable-garden-with-home-grown-plants.jpg",
    "../images/9465292.jpg",
    "../images/istockphoto-1465642013-612x612.jpg",
    
  ];

  let index = 0;
  const slider = document.getElementById("bgSlider");

  slider.style.backgroundImage = `url(${images[0]})`;

  setInterval(() => {
    index = (index + 1) % images.length;
    slider.style.backgroundImage = `url(${images[index]})`;
  }, 4000);
</script>
<script>
const cards = document.querySelectorAll(".slider-card");
let current = 0;

function showCard(index) {
  cards.forEach(card => {
    card.classList.remove("active", "exit");
  });

  cards[index].classList.add("active");

  setTimeout(() => {
    cards[index].classList.add("exit");
  }, 2000);
}

setInterval(() => {
  showCard(current);
  current = (current + 1) % cards.length;
}, 2800);

// show first card
showCard(current);
</script>
<script>
const track = document.querySelector(".slider-track");
const next = document.querySelector(".next");
const prev = document.querySelector(".prev");
const itemWidth = 260; // width + margin of one slider-item
let position = 0;

next.addEventListener("click", () => {
  const maxScroll = track.scrollWidth - track.parentElement.offsetWidth;
  position += itemWidth * 3; // move 3 cards at a time
  if(position > maxScroll) position = 0; // loop back
  track.style.transform = `translateX(-${position}px)`;
});

prev.addEventListener("click", () => {
  const maxScroll = track.scrollWidth - track.parentElement.offsetWidth;
  position -= itemWidth * 3; // move 3 cards at a time
  if(position < 0) position = maxScroll; // loop back
  track.style.transform = `translateX(-${position}px)`;
});

</script>
<script>
/* ---------- QUANTITY BUTTONS ---------- */
document.querySelectorAll('.quantity-box').forEach(box => {
    const minus = box.querySelector('.qty-minus');
    const plus = box.querySelector('.qty-plus');
    const input = box.querySelector('.qty-value');

    minus.addEventListener('click', () => {
        let val = parseInt(input.value);
        if(val > 1) input.value = val - 1;
    });

    plus.addEventListener('click', () => {
        let val = parseInt(input.value);
        input.value = val + 1;
    });
});
</script>
<script>
const userMenu = document.getElementById("userMenu");
const hoverBox = document.getElementById("userHoverBox");

function showUserMenu() {
  hoverBox.style.display = "block";
}

/* Hide when clicking outside */
document.addEventListener("click", function (event) {
  if (!userMenu.contains(event.target)) {
    hoverBox.style.display = "none";
  }
});

/* Optional: stop closing when clicking inside menu */
hoverBox.addEventListener("click", function (event) {
  event.stopPropagation();
});
</script>
<?php include '../layoutfiles/bill.php';?>
</body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
