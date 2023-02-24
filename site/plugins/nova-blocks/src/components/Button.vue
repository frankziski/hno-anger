<template>
  <div @dblclick="open" :class="classes">
    <div v-if="content.linkfield.length">
      <k-button
        v-for="(item, index) in content.linkfield"
        :key="index"
        :class="classesButton(item)"
        >
        {{ item.linktitle }}
      </k-button>
    </div>
    <div v-else>
      <k-button
        :class="classesButton"
        >
        Button...
      </k-button>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    }
  },
  methods: {
    classesButton(item) {
      return "k-button-custom k-block-button-style-" + item.style;
    }
  },
};
</script>