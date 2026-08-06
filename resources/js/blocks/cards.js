// import Swiper from 'swiper';

// document.addEventListener('DOMContentLoaded', () => {
//     const cardsContainer = document.querySelector('.cards-swiper');
    
//     if (cardsContainer) {
//         let cardsSwiper;

//         const initCardsSwiper = () => {
//             // Urządzenia mobilne i tablety (< 1024px)
//             if (window.innerWidth < 1024) {
//                 if (!cardsSwiper) {
//                     cardsSwiper = new Swiper('.cards-swiper', {
//                         slidesPerView: 1.15, // pokierowanie kawałka następnego kafelka
//                         spaceBetween: 16,
//                         grabCursor: true,
//                         breakpoints: {
//                             640: {
//                                 slidesPerView: 2.15,
//                                 spaceBetween: 24,
//                             }
//                         }
//                     });
//                 }
//             } else {
//                 // Na desktopie niszczymy Swipera, żeby grid przejął 100% kontroli
//                 if (cardsSwiper) {
//                     cardsSwiper.destroy(true, true);
//                     cardsSwiper = undefined;
//                 }
//             }
//         };

//         initCardsSwiper();
//         window.addEventListener('resize', initCardsSwiper);
//     }
// });