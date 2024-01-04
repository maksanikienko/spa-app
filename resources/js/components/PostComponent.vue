<script >
export default {
    name: "PostComponent",
    data() {
        return {
            show: false,
            selectedAvatar: null,
            captchaSrc: '',
            dropdownOpen: false,
            fileName: null,
        };
    },
    props: {
        avatar: { },
        authUsername: '',
        authEmail: '',
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
        updateFileName(event) {
            const input = event.target;
            this.fileName = input.files[0] ? input.files[0].name : null;
        },
    },
};
</script>

<template>
    <div id="app">
        <button class="btn btn-primary btn-sm reply-btn" @click="show = !show">
            Add Post
        </button>

        <transition name="fade">
            <div v-if="show">
                <!-- Reply Form -->
                <div class="reply-form mb-3">
                    <div class="user_name">
                        <label for="user_name" class="col-form-label">Name:</label>
                        <input v-if="authUsername" type="text" id="user_name" name="user_name" required placeholder="Enter your name" autofocus autocomplete="username" :value="authUsername" readonly >
                        <input v-else type="text" id="user_name" name="user_name" required placeholder="Enter your name" autofocus >
                    </div>
                    <div class="email">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input v-if="authEmail" type="email" id="email" name="email" required placeholder="Enter your email" autocomplete="email" :value="authEmail" readonly>
                        <input v-else type="email" id="email" name="email" required placeholder="Enter your email" autocomplete="email" value="quest@gmail.com">

                    </div>
                    <div class="home_page">
                        <label for="home_page" class="col-form-label">Home Page:</label>
                        <input type="url" id="home_page" name="home_page" placeholder="Enter your home page" autocomplete="url" value="https://www.url.com/">
                    </div>

                    <!-- Image upload -->
                    <input type="file" id="image" name="image" class="custom-file-input" @change="updateFileName">
                    <label class="custom-file-label" for="image">
                        <i class="fas fa-paperclip"></i>  {{ fileName || 'Upload Image' }}
                    </label>

                    <!-- Avatar button -->
                    <div class="avatar-select">
                        <button v-if="!selectedAvatar" class="btn btn-primary" @click="toggleDropdown">
                           Choose Avatar
                        </button>
                        <button v-if="selectedAvatar" class="btn" @click="toggleDropdown">
                            <img class="avatar-btn" :src="'/storage/avatar_memoji_images/' + selectedAvatar">
                            <input type="hidden" name="avatar" :value=selectedAvatar required>
                        </button>
                        <!-- Avatar dropdown select -->
                        <div class="dropdown-list-avatar" v-if="dropdownOpen">
                            <div class="avatar-grid">
                                <div v-for="filename in avatar" :key="filename" @click="selectAvatar(filename)">
                                    <img :src="'/storage/avatar_memoji_images/' + filename" alt="Avatar">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Captcha field -->
                    <div class="captcha-field">
                        <div class="captcha-form">
                            <!-- Load Captcha -->
                            <button v-if="!captchaSrc" class="btn btn-danger btn-reload" @click="refreshCaptcha"> Load Captcha &#x21bb; </button>
                            <div class="captcha-container" v-html="captchaSrc"></div>
                            <!-- Reload Captcha -->
                            <button v-if="captchaSrc" class="btn btn-danger reload" @click="refreshCaptcha">&#x21bb;</button>
                        </div>
                        <input type="text" id="captcha" name="captcha" required placeholder="Enter the code">
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
    transition: opacity 1.0s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.dropdown-list-avatar {
    width: 100%;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0 0 0.25rem 0.25rem;
    max-height: 100px; /* Set a maximum height if needed */
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
    display: grid;
    grid-template-columns: repeat(3,auto);
    grid-template-rows: repeat(3,auto);
}
.avatar-grid > div {
    margin: 5px; /* Здесь вы можете установить нужное значение внешнего отступа */
}
.avatar-grid div img {
    max-height: 50px;
    max-width: 50px;
    height: auto;
    border-radius: 50%;
    cursor: pointer;

}

.reply-form {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: auto auto;
    align-items: center;
    justify-items: center;
    column-gap: 10px;
    row-gap: 10px;
}

.captcha-form {
    display: flex;
    align-items: center;
    justify-content: center;
}

.custom-file-label {
    position: unset; /*  remove 'position:absolute' from "upload image" block */
    cursor: pointer;
}
.custom-file-input {
    display: none; /* remove input form "upload image" */
}
.custom-file-label {
   margin-bottom: unset; /* remove margin "upload image" button */
}
.custom-file-label::after {
    display: none; /* remove browse button */
}

@media (max-width: 770px) {
    .reply-form {
        grid-template-columns: 1fr;
        align-items: center;
        justify-items: start;

    }
}

</style>
