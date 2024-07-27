 <style>
     .timeline-breaker {
         background: #55A79A;
         color: #fff;
         font-weight: 600;
         border-radius: 2px;
         margin: 0;
         text-align: center;
         padding: .6em;
         line-height: 1;
         display: block;
         width: 100%;
         max-width: 10em;
         clear: both;
         border-radius: 20px
     }

     .timeline-breaker.timeline-breaker-bottom,
     .timeline-breaker.timeline-breaker-middle {
         margin-top: 20px;
         margin-bottom: 20px;
         clear: both !important
     }

     .timeline-item {
         float: none;
         left: auto;
         right: auto;
         width: 100%;
         padding: 15px;
         margin: 60px auto 0;
         background: #f6f6f6;
         border-radius: 2px;
         position: relative;
         border: 1px solid #f2f2f2;
         border-bottom: 3px solid #55A79A;
         text-align: left
     }


     @media (min-width:576px) {

         .timeline-breaker.timeline-breaker-bottom,
         .timeline-breaker.timeline-breaker-middle {
             top: 40px;
         }


     }

     @media (min-width:576px) {

         .timeline.timeline-left .timeline-item,
         .timeline.timeline-left .timeline-item.even,
         .timeline.timeline-left .timeline-item.right,
         .timeline.timeline-right .timeline-item,
         .timeline.timeline-right .timeline-item.even,
         .timeline.timeline-right .timeline-item.right {
             width: 96%
         }
     }


     @media screen and (max-width: 991.98px) {
         .nama-event {
             margin-top: 20px;
         }
     }

     @media screen and (max-width: 991.98px) {
         .img-responsive {
             margin-top: 40px;
         }
     }

     @media screen and (max-width: 991.98px) {
         .lokasi {
             margin-top: 5px;
         }
     }

     /* Tabs*/
     section {
         padding: 0 20px;
         height: 450px;
         border-radius: 10px
     }

     #tabs {
         background: #ffffff;
         color: #1b1b1b;
     }

     #tabs .tab-content {
         margin-top: 10px;
         max-height: 450px;
     }

     #tabs .tab-content::-webkit-scrollbar {
         width: 5px;
     }

     #tabs .tab-content::-webkit-scrollbar-track {
         background: #064635;
         border-radius: 10px;
     }

     #tabs .tab-content::-webkit-scrollbar-thumb {
         background: #888;
         border-radius: 10px;
     }

     #tabs .tab-content::-webkit-scrollbar-thumb:hover {
         background: #555;
     }

     .deskripsi-dokumentasi::-webkit-scrollbar {
         width: 5px;
     }

     .deskripsi-dokumentasi::-webkit-scrollbar-track {
         background: #dbdbdb;
         border-radius: 10px;
     }

     .deskripsi-dokumentasi::-webkit-scrollbar-thumb {
         background: #064635;
         border-radius: 10px;
     }

     .deskripsi-dokumentasi::-webkit-scrollbar-thumb:hover {
         background: #dbdbdb;
     }


     .tab-pane::-webkit-scrollbar {
         width: 5px;
     }

     .tab-pane::-webkit-scrollbar-track {
         background: #dbdbdb;
         border-radius: 10px;
     }

     .tab-pane::-webkit-scrollbar-thumb {
         background: #064635;
         border-radius: 10px;
     }

     .tab-pane::-webkit-scrollbar-thumb:hover {
         background: #dbdbdb;
     }

     #tabs .nav-tabs .nav-item.show .nav-link,
     #tabs .nav-tabs .nav-link.active {
         color: #045F50 !important;
         border-bottom: 2px solid #045F50 !important;
         font-weight: bold;
     }

     #tabs .nav-tabs .nav-link {
         border: none;
         color: #121212;
         font-size: 16px;
         position: relative;
     }

     #tabs .nav-tabs {}


     .wrapper-content {
         display: flex;
         flex-direction: row;
         align-items: flex-start;
     }

     .content-detail {
         margin-bottom: 0;
         justify-content: space-between;
         top: 0;
         width: 700px;
         padding-inline: 10px;

     }

     .wrapper-event-info {
         padding-block: 10px;
         display: flex;
         justify-content: space-between;
         padding-inline: 1px
     }

     .event-info {
         font-size: 10px;
         color: #090909;
         margin-bottom: 0;
         justify-content: space-between;
         flex-direction: column;
     }

     .penyelenggara-wrapper {
         padding-block: 20px;
         display: flex;
         justify-content: space-between;
     }

     .penyelenggara-info {
         font-size: 13px;
         color: #090909;
         margin-bottom: 0;
         justify-content: space-between;
         flex-direction: column;
     }

     .penyelenggara {
         border-radius: var(--corner-radius-corner-s, 6px);
         background: var(--color-grayscale-color-disable, #f6f6f6);
         padding: 1px 30px;
         height: auto;
     }

     .penyelenggara>h6 {
         font-size: 15px;
         text-align: center;
     }

     .penyelenggara>p {
         font-size: 15px;
         text-align: center;
         margin: 0;
         font-style: initial;
     }

     .penanaman-wrapper {
         display: flex;
         justify-content: space-between;
         padding-inline: 1px;
         margin-bottom: -10px;
     }

     .penanaman-info {
         color: #090909;
         margin-bottom: 0;
         justify-content: space-between;
         flex-direction: column;
     }

     .jenis-mangrove {
         color: #716C80;
         font-size: 15px;
         font-style: initial;
     }

     .lokasi {
         color: #716C80;
         text-align: right;
         font-size: 15px;
         font-style: initial;
     }

     .penanaman-info .lokasi>h6,
     .jenis-mangrove>h6 {
         color: var(--color-grayscale-text-color-header, #121212);
         font-size: 16px;
         font-style: normal;
         font-weight: 600;
         line-height: 24px;
         letter-spacing: .5px;
         text-decoration-line: underline;
     }

     .progress-container {
         display: flex;
         justify-content: center;
         margin-bottom: 10px;
         margin-top: -10px
     }

     .custom-progress {
         width: 100%;
         height: 10px;
         /* Anda bisa menyesuaikan tinggi sesuai kebutuhan */
     }

     .progress-bar {
         background-color: #064635;
     }

     .content-progress {
         font-size: 12px;
         color: rgb(187, 185, 185);
         padding-inline: 100px;
     }

     .pendaftaran-wrapper {
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding-block: 3px
     }

     .pendaftaran-date {
         display: flex;
         gap: 5px;
         /* Menyesuaikan jarak antara span dan h6 */
     }

     .pendaftaran-date>span {
         font-size: 15px;
         color: #716C80;
     }

     .pendaftaran-date>h6 {
         color: #4B4B4B;
         font-size: 16px;
         font-weight: 600;
         line-height: 24px;
         letter-spacing: .5px;
     }

     .pendaftaran-info {
         display: flex;
         gap: 5px;
     }

     .pendaftaran-info>span {
         font-size: 15px;
         color: #716C80;
     }

     .pendaftaran-info>h6 {
         color: #4B4B4B;
         font-size: 16px;
         font-weight: 600;
         line-height: 24px;
         letter-spacing: .5px;
     }

     .custom-back-button {
         color: #064635;
         font-size: 35px;
         cursor: pointer;
     }



     .carousel-inner img {
         width: 100%;
         height: 100%;
         border-radius: 20px;
     }

     .carousel-inner video {
         width: 100%;
     }

     .deskripsi-item {
         display: none;
     }

     .deskripsi-item.active {
         display: block;
     }
 </style>
