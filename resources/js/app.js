const header = document.querySelector('.site-header');
const nav = document.querySelector('.site-header__nav');
const toggle = document.querySelector('.nav-toggle');
const revealItems = document.querySelectorAll('.reveal');
const yearTarget = document.getElementById('currentYear');

if (yearTarget) {
    yearTarget.textContent = new Date().getFullYear();
}

const handleScroll = () => {
    if (!header) return;

    if (window.scrollY > 30) {
        header.classList.add('is-scrolled');
    } else {
        header.classList.remove('is-scrolled');
    }
};

if (toggle && nav) {
    toggle.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', String(isOpen));
    });

    nav.querySelectorAll('.nav-link').forEach((link) => {
        link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
        });
    });
}

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.18 }
);

revealItems.forEach((item) => observer.observe(item));
window.addEventListener('scroll', handleScroll, { passive: true });
handleScroll();

