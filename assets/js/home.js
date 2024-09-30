//Сделать на jquery анимацию двигающихся постов в trending menu

// function trending_menu_posts_move() {
//   let menuItems = document.querySelectorAll(".trending-menu li");

//   // Установка начальной позиции для каждого элемента
//   menuItems.forEach((item, index) => {
//     // Начальная позиция
//     item.style.position = "absolute"; // Чтобы позиционировать элементы
//     item.style.left = "-100px"; // Начальное положение слева

//     // Двигаем элементы в их начальное положение
//     setTimeout(() => {
//       item.style.left += item.style.left.slice(0, -2); // Движение до начальной позиции
//     }, 1000); // Задержка между анимациями для каждого элемента
//   });
// }

// // Убедитесь, что DOM полностью загружен перед вызовом функции
// document.addEventListener("DOMContentLoaded", trending_menu_posts_move);
