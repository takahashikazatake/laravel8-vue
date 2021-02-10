<template>
  <div class="container">
    <div class="d-flex flex-row-reverse">
      <button
        type="button"
        class="btn btn-primary btn-sm mb-3"
        data-toggle="modal"
        data-target="#exampleModal"
      >投稿</button>
    </div>
    <post-component v-for="post in posts" :key="post.id" :post="post"></post-component>
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">好きなことをつぶやこう</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="TweetTitle">タイトル</label>
              <input class="form-control" type="text" id="TweetTitle" />
            </div>
            <div class="form-group">
              <label for="Textarea">ツイート</label>
              <textarea class="form-control" id="Textarea" rows="5"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">投稿する</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PostComponent from "./PostComponent";
export default {
  components: {
    PostComponent
  },
  data: function() {
    return {
      posts: [
        {
          id: 1,
          user: "User Name",
          tweet:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          createdAt: "2021年02月12日"
        },
        {
          id: 2,
          user: "User Name2",
          tweet:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
          createdAt: "2021年02月16日"
        }
      ]
    };
  }
};
</script>

<style>
</style>