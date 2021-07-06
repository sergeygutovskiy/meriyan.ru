<template>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <router-link :to="{ name: 'tours' }">
                            ТУРЫ
                        </router-link>
                    </li>
                    <li class="list-group-item">
                        <router-link :to="{ name: 'tours' }">
                            ЗАЯВКИ
                        </router-link>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <router-view />
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return {
            }   
        }
    }
</script>