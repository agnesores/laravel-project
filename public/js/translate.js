document.addEventListener('DOMContentLoaded', function () {
    const selectedLanguage = getCookie('selectedLanguage');
    const translateButtons = document.querySelectorAll('.translate-button');

    const translations = {
        'en': {
            'login': 'Login',
            'logout': 'Log Out',
            'register': 'Register',
            'email': 'E-mail:',
            'password': 'Password:',
            'rememberMe': 'Remember me',
            'categories': 'Categories',
        },
        'tr': {
            'login': 'Giriş Yap',
            'logout': 'Çıkış Yap',
            'register': 'Kayıt Ol',
            'email': 'E-posta:',
            'password': 'Şifre:',
            'rememberMe': 'Beni Hatırla',
            'categories': 'Kategoriler',

        }
    };

    const defaultLanguage = selectedLanguage || 'en';

    translate(defaultLanguage);

    translateButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const language = this.dataset.translate;
            translate(language);
        });
    });

    function translate(language) {
        // Get the elements to be translated from the translation object and update their content
        document.querySelectorAll('[data-translate-key]').forEach(function (element) {
            const key = element.dataset.translateKey;
            if (translations[language] && translations[language][key]) {
                element.textContent = translations[language][key];
            }
        });

        // Save the user's selected language in a cookie
        setCookie('selectedLanguage', language, 365);
    }

    function setCookie(name, value, days) {
        const expires = new Date();
        expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(name) {
        const cookieName = name + '=';
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(cookieName) === 0) {
                return cookie.substring(cookieName.length, cookie.length);
            }
        }
        return null;
    }
});
