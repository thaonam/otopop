(function ($) {
  Drupal.behaviors.otopop = {
    attach: function (context, settings) {
      /*start code*/
      //Slide Filter Activity
      if ($('#block-views-node-functions-block-3 #edit-field-sport-type-tid-wrapper').length) {
        $('#block-views-node-functions-block-3 #edit-field-sport-type-tid-wrapper').find('#edit-field-sport-type-tid').addClass('owl-carousel owl-theme  owl-sport-activity');
        setTimeout(function () {
          if ($('.owl-sport-activity').length) {
            $('.owl-sport-activity').owlCarousel({
              autoPlay: false, //Set AutoPlay to 3 seconds
              items: 5,
              itemsDesktop: [1199, 5],
              itemsDesktopSmall: [979, 4],
              itemsTablet: [768, 3],
              itemsMobile: [479, 2],
              pagination: false,
            });
          }
        }, 0);
      }

      if ($('#block-views-node-functions-block-30 #edit-field-sport-type-tid-wrapper').length) {
        $('#block-views-node-functions-block-30 #edit-field-sport-type-tid-wrapper').find('#edit-field-sport-type-tid').addClass('owl-carousel owl-theme  owl-sport-activity-10slide');
        setTimeout(function () {
          if ($('.owl-sport-activity-10slide').length) {
            $('.owl-sport-activity-10slide').owlCarousel({
              autoPlay: false,
              items: 10,
              loop: true,
              itemsDesktop: [1199, 8],
              itemsDesktopSmall: [979, 6],
              itemsTablet: [768, 5],
              itemsMobile: [479, 2],
              pagination: false,
            });
          }
        }, 0);
      }

      $('#block-views-node-functions-block-10 .view-display-id-block_10 .view-display-id-attachment_2 .views-row .views-field-field-full-name .views-field-field-meters').each(function () {
        //  parseInt
        $(this)[0].innerText = (parseInt($(this)[0].innerText) / 1000).toFixed(1) + ' km';
      });


      if ($('#block-views-node-functions-block-3').length) {
        var value_checkbox = $('#block-views-node-functions-block-3 input:checked').attr('value');
        console.log($('#block-views-node-functions-block-3 .view-display-id-block_3 .view-header a'));
        if (value_checkbox != 'All') {
          $('#block-views-node-functions-block-3 .view-display-id-block_3 .view-header a').once('value_filter').attr('href', $('#block-views-node-functions-block-3 .view-display-id-block_3 .view-header a')[0].pathname + '/' + value_checkbox);
        }
      }

      //Hash Link Active Tabs Bootstrap
      // Javascript to enable link to tab
      var hash = document.location.hash;
      var prefix = "tab_";
      if (hash) {
        $('.nav-tabs a[href="' + hash.replace(prefix, "") + '"]').tab('show');
      }

      // Change hash for page-reload
      $('.nav-tabs a').on('shown', function (e) {
        window.location.hash = e.target.hash.replace("#", "#" + prefix);
      });

      $('.filter-select-2 select').each(function () {
        $(this).select2();
      });
      //Menu navbar-sidebar\
      if ($('.navbar-sidebar').length && $('.main-sidebar').length) {
        $('.navbar-sidebar').each(function () {
          $(this).click(function () {
            $(this).toggleClass('open');
            if ($('.sidebar-toggle').length) {
              $('.main-sidebar.sidebar-toggle').toggleClass('open');
              if ($('.main-sidebar.sidebar-toggle').hasClass('open')) {

                $('.main-sidebar.sidebar-toggle').animate({
                  "left": "0",
                  "display": "block",

                }, 1000);
                $('.main-sidebar.sidebar-toggle').next().animate({
                  "margin-left": "300px",
                  "display": "block",
                }, 1000);
              }
              else {
                $('.main-sidebar.sidebar-toggle').animate({
                  "left": "-300px",
                  "display": "block",

                }, 1000);
                $('.main-sidebar.sidebar-toggle').next().animate({
                  "margin-left": "0",
                  "display": "block",
                }, 1000);
              }
            }
            else if ($('.sidebar-overlay').length) {
              $('.main-sidebar.sidebar-overlay').toggleClass('open');
              if ($('.main-sidebar.sidebar-overlay').hasClass('open')) {

                $('.main-sidebar.sidebar-overlay').animate({
                  "left": "0",
                  "display": "block",

                }, 1000);
              }
              else {
                $('.main-sidebar.sidebar-overlay').animate({
                  "left": "-300px",
                  "display": "block",

                }, 1000);
              }
            }
          })
        });
        $('.main-sidebar .btn-close').each(function () {
          $(this).click(function () {
            $(this).toggleClass('open');
            $('.main-sidebar.sidebar-overlay').toggleClass('open');
            if ($('.main-sidebar.sidebar-overlay').hasClass('open')) {

              $('.main-sidebar.sidebar-overlay').animate({
                "left": "0",
                "display": "block",

              }, 1000);
            }
            else {
              $('.main-sidebar.sidebar-overlay').animate({
                "left": "-300px",
                "display": "block",

              }, 1000);
            }
          });
        });
      }
      //banner past record
      if ($('.banner-past-record .banner-img').length) {
        $('.banner-past-record .banner-img').css('background-image', 'url(' + $('.banner-past-record .banner-img')[0].dataset.image + ')');
      }

      function send_invite_to_friends() {
        FB.ui({
          app_id: '361400111305276',
          method: 'send',
          display: 'popup',
          name: "OTOPOP",
          link: 'https://otopop.thietkewebgiaidieu.com/user/invite-friends',
          redirect_uri: "https://otopop.thietkewebgiaidieu.com/user/invite-friends",
          description: 'Join OTOPOP now..'
        });
      }

      function statusChangeCallback(response) {
        if (response.status === 'connected') {
          $('#inviteFBFriends').removeClass('hide');
        }
        else {
          $('#inviteFBFriends').addClass('hide');
        }
      }

      function checkLoginState() {
        FB.getLoginStatus(function (response) {
          statusChangeCallback(response);
        });
      }

      window.fbAsyncInit = function () {
        FB.init({
          appId: '361400111305276',
          cookie: true,  // enable cookies to allow the server to access the session
          xfbml: true,  // parse social plugins on this page
          version: 'v2.8' // use graph api version 2.8
        });

        FB.getLoginStatus(function (response) {
          statusChangeCallback(response);
        });
      };

      (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));


      if (typeof (Storage) !== 'undefined') {
        // code xu li remove notifications
        $('.info-acc__right .btn').each(function () {
          $(this).on('click', function () {
            const test = sessionStorage.status = false;
            console.log(test + ": hello funny!");
          });
        });
        // Khởi tạo sesionStorage
        sessionStorage.setItem('name', 'Ted Mosby');
        // get sessionStorage
        sessionStorage.getItem('name');
        // lấy ra số lượng session đã lưu trữ
        sessionStorage.length;
        console.log(sessionStorage);
        // // xóa 1 item localStorage
        // sessionStorage.removeItem('name');
        // // xóa tất cả item trong sessionStorage
        // sessionStorage.clear();
        console.log('Có hỗ trợ');
      }
      else {
        alert('Trình duyệt của bạn không hỗ trợ!');
      }
      // code xu li o cac trang khac
      const status = sessionStorage.status;
      console.log("Other Page huh!!!");
      // kiem tra dieu kien
      console.log(sessionStorage.status);
      if (sessionStorage.status) {
        console.log("Hub, test in function compare!");
        $('.info-acc__right .btn').attr('href', '/user/profile');
        // append notifications
      }
      else {
        $('.info-acc__right .btn').attr('href', '/user/invite-friends');

      }
      // if (typeof (Storage) !== 'undefined') {
      //
      //   // code xu li remove notifications
      //   $('.close-block').each(function () {
      //     $(this).on('click', function () {
      //       $(this).closest('.block-notification').remove();
      //       const test = sessionStorage.status = false;
      //       console.log(test + ": hello funny!");
      //     });
      //   });
      //
      // }
      // else {
      //   alert("Sorry, your browser does not support web Storage..."), !1;
      // }
      // // code xu li o cac trang khac
      // const status = sessionStorage.status;
      // console.log("Other Page huh!!!");
      // // kiem tra dieu kien
      // console.log(sessionStorage.status);
      // if (sessionStorage.status) {
      //   console.log("Hub, test in function compare!");
      //   $('.block-notification').remove();
      //   // append notifications
      // }
      // /*end code*/
    }
  };
})
(jQuery);
