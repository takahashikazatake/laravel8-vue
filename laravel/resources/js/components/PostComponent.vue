<template>
  <div class="card mb-2">
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
  data: function() {
    return {
      
    };
  }
};
</script>

<style>
</style>
