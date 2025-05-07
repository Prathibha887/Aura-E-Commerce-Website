

// tabs.js
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.account_tab');
    const tabContents = document.querySelectorAll('.tab_content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs and content sections
            tabs.forEach(t => t.classList.remove('active-tab'));
            tabContents.forEach(content => content.classList.remove('active-tab'));
            
            // Add active class to the clicked tab
            tab.classList.add('active-tab');
            
            // Show the corresponding content based on data-target attribute
            const targetId = tab.getAttribute('data-target');
            const targetContent = document.querySelector(targetId);
            
            if (targetContent) {
                targetContent.classList.add('active-tab');
            }
        });
    });
  });