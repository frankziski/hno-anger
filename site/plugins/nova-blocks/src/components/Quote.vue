<template>
  <div :class="classes" @dblclick="open">
    <k-writer
      ref="text"
      :inline="true"
      :marks="textField.marks"
      :placeholder="textField.placeholder"
      :value="content.text"
      class="k-block-type-quote-text"
      @input="update({ text: $event })"
    />
    <k-writer
      ref="citation"
      :inline="true"
      :marks="citationField.marks"
      :placeholder="citationField.placeholder"
      :value="content.citation"
      class="k-block-type-quote-citation"
      @input="update({ citation: $event })"
    />
  </div>
</template>

<script>
export default {
  computed: {
    citationField() {
      return this.field("citation", {});
    },
    textField() {
      return this.field("text", {});
    },
    classes() {
      return "k-custom-block k-block-type-quote-editor k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
  },
  methods: {
    focus() {
      this.$refs.text.focus();
    }
  },
};
</script>