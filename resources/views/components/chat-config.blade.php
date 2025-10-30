<!-- ==========================================================
     FACEBOOK + ZALO CHAT CONFIG (Laravel 8)
     ========================================================== -->

<!-- 💬 Floating Buttons -->
<style>
.chat-floating {
    position: fixed;
    right: 20px;
    bottom: 300px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    z-index: 9999;
}
.chat-btn {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.25);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    border: none;
    cursor: pointer;
    padding: 0;
}
.chat-btn:hover {
    transform: scale(1.12);
    box-shadow: 0 6px 12px rgba(0,0,0,0.35);
}
.chat-btn img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
/* --- Responsive --- */
@media (max-width: 576px) {
    .chat-floating {
        right: 10px;
        bottom: 120px;
        gap: 10px;
    }
    .chat-btn {
        width: 45px;
        height: 45px;
    }
}
@media (min-width: 577px) and (max-width: 992px) {
    .chat-floating {
        right: 15px;
        bottom: 200px;
    }
    .chat-btn {
        width: 50px;
        height: 50px;
    }
}
</style>

<!-- 💬 Floating Buttons HTML -->
<div class="chat-floating">
    <button id="open-messenger" class="chat-btn messenger" aria-label="Chat qua Messenger">
        <img src="{{ asset('images/messenger-icon.png') }}" alt="Messenger">
    </button>
    <button id="open-zalo" class="chat-btn zalo" aria-label="Chat qua Zalo">
        <img src="{{ asset('images/zalo-icon.png') }}" alt="Zalo">
    </button>
</div>

<!-- 💬 Facebook Messenger Plugin -->
<div id="fb-root"></div>
<div id="fb-customer-chat" class="fb-customerchat"></div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "{{ config('chat.facebook_page_id') }}");
      chatbox.setAttribute("attribution", "biz_inbox");
  });

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v19.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<!-- 💬 Zalo Chat Widget -->
<div class="zalo-chat-widget" 
     data-oaid="{{ config('chat.zalo_oa_id') }}" 
     data-welcome-message="Xin chào! Bạn cần hỗ trợ gì?" 
     data-autopopup="0" 
     data-width="350" 
     data-height="420">
</div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>

<!-- 💬 Active Chat Buttons -->
<script>
document.getElementById('open-messenger').addEventListener('click', function() {
    if (typeof FB !== 'undefined' && FB.CustomerChat) {
        FB.CustomerChat.showDialog();
    } else {
        window.open('https://m.me/{{ config('chat.facebook_username') }}', '_blank');
    }
});

document.getElementById('open-zalo').addEventListener('click', function() {
    const zaloFrame = document.querySelector('.zalo-chat-widget iframe');
    if (zaloFrame) {
        zaloFrame.contentWindow.postMessage({ type: 'openChat' }, '*');
    } else {
        window.open('https://zalo.me/{{ config('chat.zalo_phone') }}', '_blank');
    }
});
</script>
