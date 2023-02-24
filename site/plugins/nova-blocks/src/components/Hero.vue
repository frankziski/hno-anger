<template>
  <div :class="classes" @dblclick="open">
    <template v-if="this.content.heromediatype == 'heroimage'">
      <img v-if="this.content.heromedia[0]"
        :class="classesImg"
        :src="this.content.heromedia[0].url"
      >
    </template>
    <template v-if="this.content.heromediatype == 'herovideo'">
      <video v-if="video" controls>
        <source :src="video">
      </video>
    </template>
    <div :class="classesText">
      <h1>
        <k-writer
          ref="input"
          :inline="true"
          :marks="true"
          :class="classesHeading"
          :placeholder="headingField.placeholder  || 'Headline…'"
          :value="content.heroheading"
          @input="update({ heroheading: $event })"
        />
      </h1>
      <k-writer v-if="this.content.herotext"              
        :inline="true"
        :value="content.herotext"
        @input="update({ herotext: $event })"
      />
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    classes() {
      return "k-custom-block k-block-type-hero k-block-align-" + this.content.alignblock + ' k-content-align-' +  this.content.aligncontent + ' ' + this.content.heromediatype + ' block-width-' + this.content.width;
    },
    video() {
      if (this.content.herovideo[0]) {
          return this
              .content
              .herovideo[0]
              .url;
      }
      return false;
    },
    classesImg() {
      return "k-block-align-" + this.content.aligncontent + " k-block-type-hero-media";
    },
    classesHeading() {
      return "k-block-type-heading-" + this.content.level;
    },
    classesText() {
      return "hero-text k-block-align-" + this.content.aligncontent + " k-block-type-" + "hero-text";
    },
    headingField() {
      return this.field("heroheading") || '';
    }
  }
};
</script>