/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import './reload-captcha';
import './select-form';
import './update-message-form';
import './delete-message-confirm';

import {createApp} from 'vue';
import PostComponent from './components/PostComponent.vue';
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({

});

// Зарегистрируйте компонент
app.component('post-component', PostComponent);

// Монтируйте приложение на элемент с id "app"
app.mount('#app');
