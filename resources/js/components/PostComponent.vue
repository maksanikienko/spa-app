<script >
export default {
    name: "PostComponent",
    data() {
        return {
            show: false,
            selectedAvatar: null,
            captchaSrc: '',
            dropdownOpen: false,

        };
    },
    props: {
        avatar: { },
    },
    methods: {
        refreshCaptcha() {
            axios.get('/reload-captcha')
                .then(response => {
                    this.captchaSrc = response.data.captcha;
                })
                .catch(error => {
                    console.error('Error refreshing captcha:', error);
                });
        },
        selectAvatar(filename) {
            this.selectedAvatar = filename;
            this.dropdownOpen = false;
        },
        toggleDropdown() {
            this.dropdownOpen = !this.dropdownOpen;
        },
    },
};
</script>

<template>
    <div id="app">
        <button @click="show = !show">
            Переключить
        </button>

        <transition name="fade">
            <div v-if="show">

                <!-- Отображение формы комментария -->
                <div class="row mb-5">
                    <div class="col-md-4">
                        <label for="user_name" class="col-form-label">Name:</label>
                        <input type="text" id="user_name" name="user_name" required placeholder="Enter your name">
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    <div class="col-md-4">
                        <label for="home_page" class="col-form-label">Home Page:</label>
                        <input type="url" id="home_page" name="home_page" placeholder="Enter your home page">
                    </div>
                </div>

                <div class="row mb-5 d-flex align-items-center">

                    <!-- Image upload -->
                    <div class="col-md-4">
                        <label for="image" class="col-form-label">
                            Upload Image:
                        </label>
                        <input type="file" id="image" name="image" >
                    </div>


                    <!-- Choose avatar -->
                    <div class="col-md-4 text-center">
                        <button v-if="!selectedAvatar" class="btn btn-primary" @click="toggleDropdown">
                           Choose Avatar
                        </button>
                        <button v-if="selectedAvatar" class="btn" @click="toggleDropdown">
                            <img class="avatar-btn" :src="'/storage/avatar_memoji_images/' + selectedAvatar">
                            <input type="hidden" name="avatar" :value=selectedAvatar>
                        </button>

                        <div class="dropdown-list-avatar" v-if="dropdownOpen">
                            <div class="avatar-grid">
                                <div v-for="filename in avatar" :key="filename" @click="selectAvatar(filename)">
                                    <img :src="'/storage/avatar_memoji_images/' + filename" alt="Avatar">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Captcha field -->
                    <div class="col-md-4">
                        <div class="captcha-form">                                               <!-- .captcha-form  -->
                            <span class="captcha-container">
                            {{captchaSrc}}
                            </span>         <!-- .captcha-container reload code -->
                            <button type="button" class="btn btn-danger reload" @click="refreshCaptcha" >&#x21bb;</button>
                            <input type="text" id="captcha" name="captcha" required placeholder="Enter the code">
                        </div>
                    </div>

                </div>


                <!-- Message field -->
                <div class="mb-3">
                    <label for="text" class="form-label">Message</label>
                    <textarea class="form-control" id="text" name="text" rows="4" required placeholder="Enter your message"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" @click="show = !show">Send</button>


            </div>
        </transition>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.dropdown-list-avatar {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-top: none;
    border-radius: 0 0 0.25rem 0.25rem;
    overflow: hidden;
    max-height: 200px; /* Set a maximum height if needed */
    overflow-y: auto;
    z-index: 1000;
}
.avatar-btn {
    max-height: 70px;
    max-width: 70px;
    border-radius: 50%;
}
.avatar-btn:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
}
.avatar-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.avatar-grid div {
    width: 33%;
    box-sizing: border-box;
}

.avatar-grid div img {
    max-height: 50px;
    max-width: 50px;
    height: auto;
}

.dropdown-list-avatar div {
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
}

</style>
