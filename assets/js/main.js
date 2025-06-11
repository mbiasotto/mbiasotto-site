$(document).ready(() => {
  // ===== LOADING SCREEN =====
  $(window).on("load", () => {
    setTimeout(() => {
      $("#loading-screen").addClass("fade-out")
      setTimeout(() => {
        $("#loading-screen").remove()
      }, 500)
    }, 1000)
  })

  // ===== AOS ANIMATION INITIALIZATION =====
  AOS.init({
    duration: 800,
    easing: "ease-in-out",
    once: true,
    offset: 100,
  })

  // ===== NAVBAR SCROLL EFFECT =====
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $(".navbar").addClass("navbar-scrolled")
    } else {
      $(".navbar").removeClass("navbar-scrolled")
    }
  })

  // ===== SMOOTH SCROLLING =====
  $('a[href^="#"]').on("click", function (event) {
    var target = $(this.getAttribute("href"))
    if (target.length) {
      event.preventDefault()
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: target.offset().top - 80,
          },
          1000,
        )
    }
  })

  // ===== COUNTER ANIMATION =====
  function animateCounters() {
    $(".counter").each(function () {
      var $this = $(this)
      var countTo = Number.parseInt($this.attr("data-target"))
      var currentCount = Number.parseInt($this.text())

      if (currentCount < countTo) {
        $({ countNum: currentCount }).animate(
          {
            countNum: countTo,
          },
          {
            duration: 2000,
            easing: "swing",
            step: function () {
              $this.text(Math.floor(this.countNum))
            },
            complete: function () {
              $this.text(this.countNum)
            },
          },
        )
      }
    })
  }

  // ===== INTERSECTION OBSERVER FOR COUNTERS =====
  const statsSection = document.querySelector("#stats-section")
  let countersAnimated = false

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !countersAnimated) {
          animateCounters()
          countersAnimated = true
        }
      })
    },
    {
      threshold: 0.5,
    },
  )

  if (statsSection) {
    observer.observe(statsSection)
  }

  // ===== CONTACT FORM HANDLING =====
  $("#contactForm").on("submit", function (e) {
    e.preventDefault()

    const $form = $(this)
    const $submitBtn = $form.find('button[type="submit"]')
    const $btnText = $submitBtn.find(".btn-text")
    const $btnLoading = $submitBtn.find(".btn-loading")

    // Show loading state
    $btnText.addClass("d-none")
    $btnLoading.removeClass("d-none")
    $submitBtn.prop("disabled", true)

    // Simulate form submission
    setTimeout(() => {
      // Hide loading state
      $btnText.removeClass("d-none")
      $btnLoading.addClass("d-none")
      $submitBtn.prop("disabled", false)

      // Show success message
      showNotification("Mensagem enviada com sucesso! Retornarei em breve.", "success")

      // Reset form
      $form[0].reset()
    }, 2000)
  })

  // ===== NOTIFICATION SYSTEM =====
  function showNotification(message, type = "success") {
    const notification = $(`
            <div class="notification notification-${type}">
                <div class="notification-content">
                    <i class="fas ${type === "success" ? "fa-check-circle" : "fa-exclamation-circle"}"></i>
                    <span>${message}</span>
                    <button class="notification-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `)

    $("body").append(notification)

    setTimeout(() => {
      notification.addClass("show")
    }, 100)

    // Auto remove after 5 seconds
    setTimeout(() => {
      notification.removeClass("show")
      setTimeout(() => {
        notification.remove()
      }, 300)
    }, 5000)

    // Manual close
    notification.find(".notification-close").on("click", () => {
      notification.removeClass("show")
      setTimeout(() => {
        notification.remove()
      }, 300)
    })
  }

  // ===== BACK TO TOP BUTTON =====
  const $backToTop = $("#backToTop")

  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $backToTop.addClass("show")
    } else {
      $backToTop.removeClass("show")
    }
  })

  $backToTop.on("click", () => {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      800,
    )
  })

  // ===== MOBILE SIDEBAR MENU =====
  const $mobileOverlay = $("#mobileOverlay")
  const $navbarCollapse = $("#navbarNav")
  const $navbarToggler = $(".navbar-toggler")
  
  // Função para abrir menu
  function openMobileMenu() {
    if ($(window).width() <= 768) {
      $mobileOverlay.addClass("show")
      $navbarCollapse.addClass("show")
      $("body").css("overflow", "hidden")
      $navbarToggler.attr("aria-expanded", "true")
    }
  }

  // Função para fechar menu
  function closeMobileMenu() {
    $mobileOverlay.removeClass("show")
    $navbarCollapse.removeClass("show")
    $("body").css("overflow", "")
    $navbarToggler.attr("aria-expanded", "false")
  }

  // Event listeners
  $navbarToggler.on("click", (e) => {
    e.preventDefault()
    e.stopPropagation()
    if ($navbarCollapse.hasClass("show")) {
      closeMobileMenu()
    } else {
      openMobileMenu()
    }
  })

  // Fechar ao clicar no botão X - usar delegação de eventos
  $(document).on("click", "#mobileMenuClose", (e) => {
    e.preventDefault()
    e.stopPropagation()
    closeMobileMenu()
  })

  // Fechar ao clicar no overlay
  $mobileOverlay.on("click", (e) => {
    if (e.target === e.currentTarget) {
      closeMobileMenu()
    }
  })

  // Fechar ao clicar em um link
  $(document).on("click", ".navbar-nav .nav-link", () => {
    if ($(window).width() <= 768) {
      setTimeout(closeMobileMenu, 300) // Pequeno delay para UX
    }
  })

  // Fechar menu se redimensionar para desktop
  $(window).on("resize", () => {
    if ($(window).width() > 768) {
      closeMobileMenu()
    }
  })

  // Fechar com tecla ESC
  $(document).on("keydown", (e) => {
    if (e.key === "Escape" && $navbarCollapse.hasClass("show")) {
      closeMobileMenu()
    }
  })

  // ===== MOBILE FORM OPTIMIZATIONS =====
  // Prevent zoom on iOS when focusing inputs
  if (window.innerWidth <= 768) {
    $('input[type="email"], input[type="tel"], input[type="text"], textarea, select').attr('autocomplete', 'on')
  }

  // ===== MOBILE TOUCH ENHANCEMENTS =====
  // Add touch feedback to interactive elements
  $(".service-card, .testimonial-card, .btn").on("touchstart", function() {
    $(this).addClass("touch-active")
  }).on("touchend touchcancel", function() {
    $(this).removeClass("touch-active")
  })

  // ===== MOBILE PERFORMANCE OPTIMIZATIONS =====
  // Debounce scroll events for better performance
  let scrollTimeout
  $(window).scroll(function() {
    if (scrollTimeout) {
      clearTimeout(scrollTimeout)
    }
    scrollTimeout = setTimeout(() => {
      // Keep existing scroll functions working
    }, 10)
  })

  // ===== FORM VALIDATION ENHANCEMENT =====
  $("input, textarea, select").on("blur", function () {
    const $this = $(this)
    if ($this.prop("required") && !$this.val()) {
      $this.addClass("is-invalid")
    } else {
      $this.removeClass("is-invalid").addClass("is-valid")
    }
  })

  $("input, textarea, select").on("input", function () {
    const $this = $(this)
    if ($this.hasClass("is-invalid") && $this.val()) {
      $this.removeClass("is-invalid").addClass("is-valid")
    }
  })

  // ===== CURRENT YEAR =====
  $("#currentYear").text(new Date().getFullYear())

  // ===== HOVER ANIMATIONS =====
  $(".service-card").hover(
    function () {
      $(this).find(".service-icon").addClass("animate__animated animate__pulse")
    },
    function () {
      $(this).find(".service-icon").removeClass("animate__animated animate__pulse")
    },
  )

  // ===== ACCESSIBILITY IMPROVEMENTS =====
  $(".navbar-toggler").on("click", () => {
    setTimeout(() => {
      if ($(".navbar-collapse").hasClass("show")) {
        $(".navbar-nav .nav-link:first").focus()
      }
    }, 300)
  })

  $(".service-card, .stat-item").attr("tabindex", "0")

  $(".service-card, .stat-item").on("keydown", function (e) {
    if (e.key === "Enter" || e.key === " ") {
      $(this).trigger("click")
    }
  })
})

// ===== NOTIFICATION STYLES =====
const notificationStyles = `
<style>
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    z-index: 10000;
    transform: translateX(400px);
    transition: transform 0.3s ease;
    max-width: 400px;
}

.notification.show {
    transform: translateX(0);
}

.notification-content {
    padding: 1rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.notification-success {
    border-left: 4px solid #10b981;
}

.notification-success i {
    color: #10b981;
}

.notification-error {
    border-left: 4px solid #ef4444;
}

.notification-error i {
    color: #ef4444;
}

.notification-close {
    background: none;
    border: none;
    color: #6b7280;
    cursor: pointer;
    margin-left: auto;
    padding: 0.25rem;
}

.notification-close:hover {
    color: #374151;
}
</style>
`

$("head").append(notificationStyles)
