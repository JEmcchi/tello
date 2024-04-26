<script>
  window.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.section');
    const navLinks = document.querySelectorAll('.nav-link');
    const navbar = document.getElementById('navbar');
    const hamburger = document.getElementById('hamburger');
    const navLinksContainer = document.getElementById('navLinks');

    const observerOptions = {
        rootMargin: '-50% 0px -50% 0px',
        threshold: 0.2
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const id = entry.target.id;
            if (entry.isIntersecting) {
                navLinks.forEach(link => {
                    if (link.getAttribute('href').slice(1) === id) {
                        link.classList.add('active-link');
                    } else {
                        link.classList.remove('active-link');
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });

    window.addEventListener('scroll', () => {
        if (window.scrollY > 1) {
            navbar.classList.add('sticky');
        } else {
            navbar.classList.remove('sticky');
        }

        // Update active link based on section in view
        let currentSectionId = '';
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top <= 1 && rect.bottom >= 1) {
                currentSectionId = section.id;
            }
        });
        navLinks.forEach(link => {
            if (link.getAttribute('href').slice(1) === currentSectionId) {
                link.classList.add('active-link');
            } else {
                link.classList.remove('active-link');
            }
        });
    });

    // Smooth scrolling when a navigation link is clicked
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href').slice(1);
            const targetSection = document.getElementById(targetId);
            window.scrollTo({
                top: targetSection.offsetTop,
                behavior: 'smooth'
            });
        });
    });

    // Toggle visibility of navigation links on hamburger button click
        hamburger.addEventListener('click', () => {
            navLinksContainer.classList.toggle('hidden');
        });

        // Hide navigation links when the window is resized to small
        window.addEventListener('resize', () => {
            if (window.innerWidth < 640) {
                navLinksContainer.classList.add('hidden');
            } else {
                navLinksContainer.classList.remove('hidden');
            }
        });
    });

</script>

</body>
</html>