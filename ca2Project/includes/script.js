document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.sm\\:hidden button');
    const mobileMenu = document.querySelector('.sm\\:hidden #mobile-menu');
    
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Form validation
    const contactForm = document.querySelector('form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple validation
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            let isValid = true;
            
            if (!name.value.trim()) {
                name.classList.add('border-red-500');
                isValid = false;
            } else {
                name.classList.remove('border-red-500');
            }
            
            if (!email.value.trim() || !email.value.includes('@')) {
                email.classList.add('border-red-500');
                isValid = false;
            } else {
                email.classList.remove('border-red-500');
            }
            
            if (isValid) {
                // Here you would typically submit the form via AJAX
                alert('Thank you for your message! We will contact you soon.');
                this.reset();
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Animate elements when they come into view
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.fade-in, .slide-in');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('animate');
            }
        });
    };
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run once on page load
});

// Demo functionality for interactive elements
function initDemoFeatures() {
    // Dashboard demo toggle
    const demoButtons = document.querySelectorAll('.demo-toggle');
    demoButtons.forEach(button => {
        button.addEventListener('click', function() {
            const demoPanel = document.getElementById(this.dataset.target);
            if (demoPanel) {
                demoPanel.classList.toggle('hidden');
            }
        });
    });
    
    // ROI calculator
    const roiCalculator = document.getElementById('roi-calculator');
    if (roiCalculator) {
        const calculateROI = function() {
            const projectValue = parseFloat(document.getElementById('project-value').value) || 0;
            const reworkPercent = parseFloat(document.getElementById('rework-percent').value) || 0;
            
            const currentReworkCost = projectValue * (reworkPercent / 100);
            const potentialSavings = currentReworkCost * 0.6; // 60% reduction
            const annualSavings = potentialSavings * 4; // Assuming 4 projects/year
            
            document.getElementById('current-cost').textContent = currentReworkCost.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                maximumFractionDigits: 0
            });
            
            document.getElementById('potential-savings').textContent = potentialSavings.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                maximumFractionDigits: 0
            });
            
            document.getElementById('annual-savings').textContent = annualSavings.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                maximumFractionDigits: 0
            });
        };
        
        document.getElementById('project-value').addEventListener('input', calculateROI);
        document.getElementById('rework-percent').addEventListener('input', calculateROI);
        
        calculateROI(); // Initial calculation
    }
}

// Initialize when DOM is loaded
if (document.readyState !== 'loading') {
    initDemoFeatures();
} else {
    document.addEventListener('DOMContentLoaded', initDemoFeatures);
}



