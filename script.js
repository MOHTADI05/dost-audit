// ===================================
// SMOOTH SCROLLING FOR NAVIGATION
// ===================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// ===================================
// LIQUID GLASS NAVBAR SCROLL EFFECT
// ===================================

let lastScroll = 0;
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    // Add 'scrolled' class for enhanced blur effect
    if (currentScroll > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    lastScroll = currentScroll;
});

// ===================================
// NAVBAR ACTIVE LINK HIGHLIGHTING
// ===================================

// Highlight active section in navbar
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-links a');

function highlightNavigation() {
    const scrollPosition = window.pageYOffset + 100;
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute('id');
        
        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${sectionId}`) {
                    link.classList.add('active');
                }
            });
        }
    });
}

window.addEventListener('scroll', highlightNavigation);
window.addEventListener('load', highlightNavigation);

// ===================================
// TESTIMONIAL CAROUSEL
// ===================================

class TestimonialCarousel {
    constructor() {
        this.slides = document.querySelectorAll('.testimonial-slide');
        this.dots = document.querySelectorAll('.testimonial-dots .dot');
        this.prevBtn = document.querySelector('.testimonial-nav.prev');
        this.nextBtn = document.querySelector('.testimonial-nav.next');
        this.currentIndex = 0;
        this.autoPlayInterval = null;
        this.autoPlayDelay = 5000; // 5 seconds between slides
        
        this.init();
    }
    
    init() {
        if (this.slides.length === 0) return;
        
        // Event listeners
        this.prevBtn?.addEventListener('click', () => {
            this.stopAutoPlay();
            this.prev();
            this.startAutoPlay();
        });
        
        this.nextBtn?.addEventListener('click', () => {
            this.stopAutoPlay();
            this.next();
            this.startAutoPlay();
        });
        
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                this.stopAutoPlay();
                this.goToSlide(index);
                this.startAutoPlay();
            });
        });
        
        // Auto play - starts automatically
        this.startAutoPlay();
        
        // Pause on hover
        const carousel = document.querySelector('.testimonial-carousel');
        carousel?.addEventListener('mouseenter', () => this.stopAutoPlay());
        carousel?.addEventListener('mouseleave', () => this.startAutoPlay());
    }
    
    goToSlide(index) {
        // Remove active class from current slide
        this.slides[this.currentIndex].classList.remove('active');
        this.dots[this.currentIndex]?.classList.remove('active');
        
        // Update index
        this.currentIndex = index;
        
        // Add active class to new slide
        this.slides[this.currentIndex].classList.add('active');
        this.dots[this.currentIndex]?.classList.add('active');
    }
    
    next() {
        const nextIndex = (this.currentIndex + 1) % this.slides.length;
        this.goToSlide(nextIndex);
    }
    
    prev() {
        const prevIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
        this.goToSlide(prevIndex);
    }
    
    startAutoPlay() {
        // Clear any existing interval
        this.stopAutoPlay();
        
        // Start automatic rotation
        this.autoPlayInterval = setInterval(() => {
            this.next();
        }, this.autoPlayDelay);
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new TestimonialCarousel();
});

// ===================================
// FORM VALIDATION & SUBMISSION
// ===================================

const contactForm = document.querySelector('.contact-form');

if (contactForm) {
    const formMessage = document.getElementById('form-message');

    function showFormMessage(text, isSuccess) {
        if (!formMessage) return;
        formMessage.textContent = text;
        formMessage.className = 'form-message ' + (isSuccess ? 'form-message--success' : 'form-message--error');
        formMessage.style.display = 'block';
        formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (formMessage) {
            formMessage.style.display = 'none';
            formMessage.className = 'form-message';
        }

        const formData = new FormData(contactForm);
        const data = Object.fromEntries(formData);

        // Client-side validation
        if (!data.firstName || !data.lastName || !data.email || !data.phone || !data.service || !data.message) {
            showFormMessage('Veuillez remplir tous les champs obligatoires.', false);
            return;
        }

        if (!data.privacy) {
            showFormMessage("Veuillez accepter la politique de confidentialité et les conditions d'utilisation.", false);
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(data.email)) {
            showFormMessage('Veuillez entrer une adresse e-mail valide.', false);
            return;
        }

        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Envoi en cours…';
        submitBtn.disabled = true;

        try {
            const response = await fetch('send-mail.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data),
            });

            const result = await response.json();

            if (result.success) {
                showFormMessage(result.message, true);
                contactForm.reset();
            } else {
                showFormMessage(result.message || "Une erreur s'est produite. Veuillez réessayer.", false);
            }
        } catch (error) {
            showFormMessage("Une erreur réseau s'est produite. Veuillez réessayer.", false);
        } finally {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    });
}

// ===================================
// PARALLAX SCROLL EFFECTS
// ===================================

let ticking = false;
let scrollPosition = 0;

function updateParallax() {
    scrollPosition = window.pageYOffset;
    
    // Parallax for hero image - slower movement
    const heroImage = document.querySelector('.hero-img');
    if (heroImage) {
        const heroSection = document.querySelector('.hero');
        if (heroSection) {
            const heroRect = heroSection.getBoundingClientRect();
            if (heroRect.top < window.innerHeight && heroRect.bottom > 0) {
                const scrollPercentage = (window.innerHeight - heroRect.top) / (window.innerHeight + heroRect.height);
                heroImage.style.transform = `translateY(${scrollPercentage * 30}px)`;
            }
        }
    }

    // ── ABOUT PARALLAX HERO ─────────────────────────────────
    // Full-section background: zoom 140% → 100%, blur 0 → 5px as section scrolls into view
    const aboutHero = document.querySelector('.about-parallax-hero');
    const aboutOverlay = document.querySelector('.about-parallax-hero__overlay');
    if (aboutHero && aboutOverlay) {
        const aboutSection = document.querySelector('.about');
        const aRect = aboutSection.getBoundingClientRect();
        const wh = window.innerHeight;
        // 0 = section bottom touching viewport bottom, 1 = section top at viewport top
        const progress = Math.max(0, Math.min(1,
            (wh - aRect.top) / (wh + aRect.height)
        ));
        const bgSize  = 140 - progress * 40;     // 140% → 100%
        const blurVal = progress * 5;            // 0px  → 5px
        const fadeAmt = progress * 0.35;         // 0    → 0.35 dark overlay
        aboutHero.style.backgroundSize = `${bgSize}%`;
        aboutOverlay.style.backdropFilter       = `blur(${blurVal}px)`;
        aboutOverlay.style.webkitBackdropFilter = `blur(${blurVal}px)`;
        // Blend the directional gradient with a darkening fade
        aboutOverlay.style.background = `linear-gradient(
            to bottom,
            rgba(26,37,48,${fadeAmt + 0.1}) 0%,
            rgba(26,37,48,${fadeAmt * 0.3}) 60%
        )`;
    }
    
    // ----- TEAM PARALLAX SECTION REMOVED (replaced by team scroll reveal below) -----
    
    // Smooth Parallax for team images (legacy .parallax-img inside .parallax-team-block)
    const teamParallaxImages = document.querySelectorAll('.parallax-img');
    teamParallaxImages.forEach((img) => {
        const imgContainer = img.closest('.parallax-team-block');
        if (imgContainer) {
            const rect = imgContainer.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            
            // Only apply parallax when element is in viewport
            if (rect.top < windowHeight && rect.bottom > 0) {
                // Calculate parallax offset based on scroll position
                const scrolled = windowHeight - rect.top;
                const rate = scrolled * 0.15; // Parallax speed factor
                
                img.style.transform = `translate(-50%, calc(-50% + ${rate}px)) scale(1.1)`;
            }
        }
    });
    
    // Parallax for floating elements - slower movement
    const floatingElements = document.querySelectorAll('.floating-element');
    floatingElements.forEach((element, index) => {
        const speed = 0.3 + (index * 0.1);
        element.style.transform = `translateY(${scrollPosition * speed * 0.06}px)`;
    });
    
    // Parallax for decorative blobs - slower movement
    const decorativeElements = document.querySelectorAll('.hero-decorative-blob, .about-decorative, .parallax-decoration');
    decorativeElements.forEach((element, index) => {
        const speed = 0.2 + (index * 0.08);
        if (element.classList.contains('parallax-decoration')) {
            element.style.transform = `translate(-50%, -50%) translateY(${scrollPosition * speed * 0.02}px)`;
        } else {
            element.style.transform = `translate(-50%, -50%) scale(1) translateY(${scrollPosition * speed * 0.03}px)`;
        }
    });
    
    ticking = false;
}

function requestParallaxUpdate() {
    if (!ticking) {
        requestAnimationFrame(updateParallax);
        ticking = true;
    }
}

// Throttled scroll event for parallax
window.addEventListener('scroll', requestParallaxUpdate, { passive: true });

// ===================================
// INTERSECTION OBSERVER FOR ANIMATIONS
// ===================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
            
            // Add specific animation class based on data attribute
            const animationType = entry.target.dataset.animation;
            if (animationType) {
                entry.target.classList.add(animationType);
            }
            
            // Unobserve after animation to improve performance
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Apply scroll animations to elements
document.addEventListener('DOMContentLoaded', () => {
    // Service cards - staggered slide up
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach((card, index) => {
        card.classList.add('scroll-animate');
        card.dataset.animation = 'slide-up';
        card.classList.add(`animate-delay-${(index % 6) + 1}`);
        observer.observe(card);
    });
    
    // Metric cards - scale in
    const metricCards = document.querySelectorAll('.metric-card');
    metricCards.forEach((card, index) => {
        card.classList.add('scroll-animate');
        card.dataset.animation = 'scale-in';
        card.classList.add(`animate-delay-${(index % 4) + 1}`);
        observer.observe(card);
    });
    
    // Section headers - fade in down
    const sectionHeaders = document.querySelectorAll('.section-header');
    sectionHeaders.forEach(header => {
        header.classList.add('scroll-animate');
        header.dataset.animation = 'slide-down';
        observer.observe(header);
    });
    
    // Hero text - slide from left
    const heroText = document.querySelector('.hero-text');
    if (heroText) {
        heroText.classList.add('scroll-animate');
        heroText.dataset.animation = 'slide-left';
        observer.observe(heroText);
    }
    
    // Hero image - slide from right
    const heroImageContainer = document.querySelector('.hero-image');
    if (heroImageContainer) {
        heroImageContainer.classList.add('scroll-animate');
        heroImageContainer.dataset.animation = 'slide-right';
        observer.observe(heroImageContainer);
    }
    
    // About text - fade in (sticky layout)
    // About glass card - fade in
    const aboutGlassCard = document.querySelector('.about-glass-card');
    if (aboutGlassCard) {
        aboutGlassCard.classList.add('scroll-animate');
        aboutGlassCard.dataset.animation = 'slide-up';
        observer.observe(aboutGlassCard);
    }
    
    // Testimonial content - bounce in
    const testimonialContent = document.querySelectorAll('.testimonial-content');
    testimonialContent.forEach(content => {
        content.classList.add('scroll-animate');
        content.dataset.animation = 'bounce-in';
        observer.observe(content);
    });
    
    // CTA section - scale in
    const ctaText = document.querySelector('.cta-text');
    if (ctaText) {
        ctaText.classList.add('scroll-animate');
        ctaText.dataset.animation = 'scale-in';
        observer.observe(ctaText);
    }
    
    // Contact info - slide from left
    const contactInfo = document.querySelector('.contact-info');
    if (contactInfo) {
        contactInfo.classList.add('scroll-animate');
        contactInfo.dataset.animation = 'slide-left';
        observer.observe(contactInfo);
    }
    
    // Contact form - slide from right
    const contactForm = document.querySelector('.contact-form-wrapper');
    if (contactForm) {
        contactForm.classList.add('scroll-animate');
        contactForm.dataset.animation = 'slide-right';
        observer.observe(contactForm);
    }
    
    // Stats - staggered bounce in
    const stats = document.querySelectorAll('.stat-item');
    stats.forEach((stat, index) => {
        stat.classList.add('scroll-animate');
        stat.dataset.animation = 'bounce-in';
        stat.classList.add(`animate-delay-${index + 1}`);
        observer.observe(stat);
    });
    
    // Team section: reveal each member one after the other on scroll
    const teamRevealBlocks = document.querySelectorAll('.team-member-reveal');
    const teamRevealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    teamRevealBlocks.forEach(block => teamRevealObserver.observe(block));

    // ── ABOUT SECTION: word-by-word scroll reveal ────────────────
    // Split each .about-word-reveal element into individual word spans
    document.querySelectorAll('.about-word-reveal').forEach(el => {
        const text = el.textContent;
        el.textContent = '';
        text.trim().split(/\s+/).forEach((word, i) => {
            const span = document.createElement('span');
            span.className = 'about-word';
            span.textContent = word;
            span.style.transitionDelay = `${i * 0.06}s`;
            el.appendChild(span);
            el.appendChild(document.createTextNode(' '));
        });
    });

    // Reveal words as each element enters the viewport
    const aboutWordObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.querySelectorAll('.about-word').forEach(w => w.classList.add('visible'));
                aboutWordObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.about-word-reveal').forEach(el => aboutWordObserver.observe(el));

    // FAQ section header - slide down
    const faqHeader = document.querySelector('.faq .section-header');
    if (faqHeader) {
        faqHeader.classList.add('scroll-animate');
        faqHeader.dataset.animation = 'slide-down';
        observer.observe(faqHeader);
    }
    
    // FAQ items - staggered slide up (already has class in HTML)
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach((item, index) => {
        item.classList.add(`animate-delay-${(index % 6) + 1}`);
        observer.observe(item);
    });
    
    // Team Parallax Section - fade in elements
    const parallaxHeader = document.querySelector('.section-header-parallax');
    if (parallaxHeader) {
        parallaxHeader.classList.add('scroll-animate');
        parallaxHeader.dataset.animation = 'slide-down';
        observer.observe(parallaxHeader);
    }
});

// ===================================
// FAQ ACCORDION FUNCTIONALITY
// ===================================

document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const toggle = item.querySelector('.faq-toggle');
        
        const toggleFAQ = () => {
            // Close other FAQs (optional: remove these lines for multiple open FAQs)
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current FAQ
            item.classList.toggle('active');
            
            // Smooth scroll into view if opening
            if (item.classList.contains('active')) {
                setTimeout(() => {
                    item.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 400);
            }
        };
        
        question.addEventListener('click', toggleFAQ);
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleFAQ();
        });
        
        // Keyboard accessibility
        question.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleFAQ();
            }
        });
        
        // Make question focusable
        question.setAttribute('tabindex', '0');
        question.setAttribute('role', 'button');
        question.setAttribute('aria-expanded', 'false');
        
        // Update aria-expanded when toggled
        const observer = new MutationObserver(() => {
            const isActive = item.classList.contains('active');
            question.setAttribute('aria-expanded', isActive.toString());
        });
        
        observer.observe(item, { attributes: true, attributeFilter: ['class'] });
    });
});

// ===================================
// CTA BUTTONS FUNCTIONALITY
// ===================================

document.querySelectorAll('.btn-primary, .nav-cta').forEach(button => {
    if (button.textContent.includes('Consultation') || button.textContent.includes('Schedule')) {
        button.addEventListener('click', (e) => {
            if (!button.closest('form')) {
                e.preventDefault();
                const contactSection = document.querySelector('#contact');
                if (contactSection) {
                    contactSection.scrollIntoView({ behavior: 'smooth' });
                    // Focus on the first form input after scrolling
                    setTimeout(() => {
                        const firstInput = document.querySelector('#firstName');
                        firstInput?.focus();
                    }, 1000);
                }
            }
        });
    }
});

// ===================================
// SERVICE BUTTONS FUNCTIONALITY
// ===================================

document.querySelectorAll('.btn-secondary').forEach(button => {
    if (button.textContent.includes('Services')) {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const servicesSection = document.querySelector('#services');
            if (servicesSection) {
                servicesSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }
});

// ===================================
// NUMBER COUNTING ANIMATION
// ===================================

function animateCounter(element, target, duration = 3000) {
    const start = 0;
    const increment = target / (duration / 16); // 60fps
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// Animate stats when they come into view
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumbers = entry.target.querySelectorAll('.stat-number, .metric-number');
            statNumbers.forEach(stat => {
                const text = stat.textContent;
                const hasPlus = text.includes('+');
                const hasPercent = text.includes('%');
                const number = parseInt(text.replace(/[^0-9]/g, ''));
                
                if (number) {
                    stat.textContent = '0';
                    setTimeout(() => {
                        animateCounter(stat, number, 3000);
                        setTimeout(() => {
                            if (hasPlus) stat.textContent += '+';
                            if (hasPercent) stat.textContent += '%';
                        }, 3000);
                    }, 400);
                }
            });
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

// Observe hero stats and metric cards
document.addEventListener('DOMContentLoaded', () => {
    const heroStats = document.querySelector('.hero-stats');
    if (heroStats) statsObserver.observe(heroStats);
    
    const aboutMetrics = document.querySelector('.about-metrics');
    if (aboutMetrics) statsObserver.observe(aboutMetrics);
});

// ===================================
// MOUSE PARALLAX EFFECT ON CARDS
// ===================================

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('[data-tilt]');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = ((y - centerY) / centerY) * 15; // Stronger tilt
            const rotateY = ((x - centerX) / centerX) * 15;
            
            card.style.transform = `perspective(1500px) rotateX(${-rotateX}deg) rotateY(${rotateY}deg) translateZ(20px) scale(1.05)`;
            card.style.transition = 'transform 0.1s ease-out';
            
            // Move the blob
            const blob = card.querySelector('.service-blob');
            if (blob) {
                blob.style.transform = `translate(${rotateY * 2}px, ${rotateX * 2}px) scale(1.5) rotate(45deg)`;
            }
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
            card.style.transition = 'transform 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            
            const blob = card.querySelector('.service-blob');
            if (blob) {
                blob.style.transform = '';
            }
        });
    });
});

// ===================================
// LOADING ANIMATION
// ===================================

window.addEventListener('load', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.8s ease-out';
    
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 150);
    
    // Initial parallax update
    updateParallax();
});