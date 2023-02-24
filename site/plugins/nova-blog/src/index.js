import Posts from './components/Posts.vue';

import "./index.scss";

panel.plugin("fz/nova-blog", {
  blocks: {
    posts: Posts,
  },
});