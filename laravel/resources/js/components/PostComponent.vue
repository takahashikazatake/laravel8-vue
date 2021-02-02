<template>
  <div class="container">
    <div class="card mb-2">
      <div class="card-body">
        <div class="font-weight-bold">{{ user }}</div>
        <div class="card-title mt-4">{{ tweet }}</div>
        <div class="card-text mt-3">投稿日時 {{ postDate }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      user: "User Name",
      tweet:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
      postDate: "2021年02月2日"
    };
  }
};
</script>

<style>
</style>