<template>
  <div class="card mb-2">
    <div class="card-header d-flex flex-row-reverse">
      <span @click="del">&times;</span>
    </div>
    <div class="card-body">
      <div class="font-weight-bold">{{ post.user }}</div>
      <div class="card-title mt-4">{{ post.tweet }}</div>
      <div class="card-text mt-3">投稿日時 {{ post.createdAt }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post"],
  methods: {
    del: function() {
      this.$emit("del");
    }
  }
};
</script>
<style>
</style>