<template>
  <div class="card mb-2">
    <div class="card-header d-flex flex-row-reverse">
      <span @click="del" v-show="post.userId === this.authId">&times;</span>
    </div>
    <div class="card-body">
      <div class="d-flex">
        <a :href="url" class="text-dark">
          <i class="fas fa-user-circle fa-3x mr-3"></i>
        </a>
        <a :href="url" class="text-dark mt-1">
          <div class="font-weight-bold">{{ post.user }}</div>
        </a>
      </div>
      <div class="card-title mt-4">{{ post.tweet }}</div>
      <div class="card-text mt-3">投稿日時 {{ post.createdAt }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post", "authId"],
  data: function() {
    return {
      url: `users/${this.post.user}`
    };
  },
  methods: {
    del: function() {
      this.$emit("del");
    }
  }
};
</script>
<style>
</style>
