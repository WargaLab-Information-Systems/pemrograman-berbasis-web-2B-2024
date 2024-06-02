const dropdownMenus = document.querySelectorAll('ul li:has(ul)');

dropdownMenus.forEach(menu => {
  menu.addEventListener('mouseover', () => {
    const dropdown = menu.querySelector('ul');
    dropdown.style.display = 'block';
  });

  menu.addEventListener('mouseout', () => {
    const dropdown = menu.querySelector('ul');
    dropdown.style.display = 'none';
  });
});