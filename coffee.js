
    // Animation for hero section form
    const exploreBtn = document.getElementById('exploreBtn');
    const heroContent = document.querySelector('.hero-content');
    const joinForm = document.querySelector('.join-us-form');

    exploreBtn.addEventListener('click', (event) => {
      // Prevents the default link behavior if it were an <a> tag
      event.preventDefault();
      heroContent.classList.add('shifted');
      joinForm.classList.add('visible');
    });

    // New: Animation for sections on scroll
    const scrollElements = document.querySelectorAll(".animate-on-scroll");
    
    // Initialize Intersection Observer for better performance
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    scrollElements.forEach(element => {
        observer.observe(element);
    });

    // New: Pop-up message for subscription form
    const joinUsForm = document.getElementById('joinForm');
    const popupMessage = document.getElementById('popup-message');

    joinUsForm.addEventListener('submit', (event) => {
        event.preventDefault(); // Stop the form from reloading the page
        
        // Show the pop-up
        popupMessage.classList.add('show');
        
        // Hide the pop-up after 3 seconds
        setTimeout(() => {
            popupMessage.classList.remove('show');
        }, 3000);
        
        // Optional: Clear the form fields
        joinUsForm.reset();
    });

