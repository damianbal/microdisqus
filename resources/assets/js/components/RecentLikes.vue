<template>
    <div class="card bg-light mb-3">
        <div class="card-header">Recent Likes</div>
        <div class="card-body">
            <div v-if="likes.length < 1">No likes</div>
        <transition-group name="fade">
            <div class="small mb-3" v-for="(like,idx) in likes" :key="idx">
                 <a :href="like.user_link">{{ like.user }}</a> liked {{ like.created_ago }} <br> <a :href="like.post_link">{{ like.post }}</a>
            </div>
        </transition-group>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.fetch();

        setInterval(() => {
            this.fetch();
        }, 3000);
    },
    methods: {
        fetch() {
            this.likes.length = [];

            axios.get('/api/likes/recent?num=6').then(resp => {
                
                this.likes = resp.data.data;
                console.log(this.likes)
            })
        }
    },
    data: () => {
        return {
            likes: [],
        }
    }
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
