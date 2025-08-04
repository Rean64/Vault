document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.stat-number');

  const animateCounter = (obj, start, end, duration) => {
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      obj.innerHTML = Math.floor(progress * (end - start) + start) + obj.dataset.suffix;
      if (progress < 1) {
        window.requestAnimationFrame(step);
      }
    };
    window.requestAnimationFrame(step);
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const statNumber = entry.target;
        const targetValue = parseInt(statNumber.textContent.replace(/[^0-9]/g, ''));
        const suffix = statNumber.textContent.replace(/[0-9]/g, '');
        statNumber.dataset.suffix = suffix; // Store suffix in a data attribute
        animateCounter(statNumber, 0, targetValue, 60000); // 2000ms = 2 seconds
        observer.unobserve(statNumber); // Stop observing once animation starts
      }
    });
  }, { threshold: 0.5 }); // Trigger when 50% of the element is visible

  counters.forEach(counter => {
    observer.observe(counter);
  });
});