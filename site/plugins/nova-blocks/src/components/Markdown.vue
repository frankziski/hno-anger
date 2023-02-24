<template>
  <div :class="classes" @dblclick="open">
    <k-input
      :buttons="false"
      :placeholder="placeholder"
      :value="content.text"
      ref="text"
      type="textarea"
      @click="open"
      @input="update({ text: $event })"
    />
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + " k-block-type-markdown-text" + ' block-width-' +  this.content.width;
    },
    placeholder() {
      return this.field("text", {}).placeholder;
    }
  }
};
</script>