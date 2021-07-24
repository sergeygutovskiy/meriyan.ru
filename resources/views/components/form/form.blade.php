<form class="m-form m-form__theme_text ph-4 pv-6" id="footer-form">
    <div class="mb-4">
        <input 
            class="m-form-input" 
            type="text"
            name="name" 
            placeholder="Ваше имя"
            >
    </div>
    <div class="mb-4">
        <input 
            class="m-form-input" 
            type="text" 
            name="email"
            placeholder="Ваш E-mail"
            >
    </div>
    <div class="mb-2">
        <textarea 
            class="m-form-input"
            name="question"
            cols="30" 
            rows="8"
            placeholder="Ваш вопрос"></textarea>
    </div>
    <div class="mb-3 d-flex align-items-center u-text_color_green-light">
        <img class="mr-2" src="/images/static/checkbox.svg">
        <span style="font-size: 0.9rem; font-weight: 600;">
            Я согласен(а) с 
            <a 
                href="{{ url('policy') }}"
                style="border-color: inherit; font-weight: 700;"
                >
                политикой конфиденциальности
            </a>
        </span>
    </div>
    <div class="mb-4 m-form__success-text">
        <p class="u-text_color_green-light">
            Спасибо, заявка принята. Мы свяжемся с вами в ближайшее время
        </p>
    </div>
    <div>
        <button class="m-form-button u-btn u-btn_size_big u-btn_theme_green">Отправить</button>
    </div>
</form>