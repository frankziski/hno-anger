<template>
  <div :class="classes" @dblclick="open">
    <k-writer
      :class="classes"
      :inline="true"
      :placeholder="placeholder"
      :value="content.text"
      ref="text"
      @input="update({ text: $event })"
    />
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-type-info-" + this.content.context + " k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' block-width-' +  this.content.width;
    },
    placeholder() {
      return this.field("text", {}).placeholder;
    }
  }
};
</script>