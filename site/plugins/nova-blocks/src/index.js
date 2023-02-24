import Accordion from './components/Accordion.vue';
import Accordionitem from './components/Accordionitem.vue';
import Blurb from './components/Blurb.vue';
import Button from './components/Button.vue';
import Carousel from './components/Carousel.vue';
import Form from './components/Form.vue';
import Gallery from './components/Gallery.vue';
import Hero from './components/Hero.vue';
import Icon from './components/Icon.vue';
import Iframe from './components/Iframe.vue';
import Image from './components/Image.vue';
import Info from './components/Info.vue';
import Markdown from './components/Markdown.vue';
import Openingtimes from './components/Openingtimes.vue';
import Pricing from './components/Pricing.vue';
import Quote from './components/Quote.vue';
import Spacer from './components/Spacer.vue';
import Table from './components/Table.vue';
import Teaser from './components/Teaser.vue';
import Testimonial from './components/Testimonial.vue';
import Text from './components/Text.vue';
import Video from './components/Video.vue';
import Videoembed from './components/Videoembed.vue';

import "./index.scss";

panel.plugin("fz/nova-blocks", {
  blocks: {
    accordion: Accordion,
    accordionitem: Accordionitem,
    blurb: Blurb,
    button: Button,
    carousel: Carousel,
    form: Form,
    gallery: Gallery,
    hero: Hero,
    icon: Icon,
    iframe: Iframe,
    image: Image,
    info: Info,
    markdown: Markdown,
    openingtimes: Openingtimes,
    pricing: Pricing,
    quote: Quote,
    spacer: Spacer,
    table: Table,
    teaser: Teaser,
    testimonial: Testimonial,
    text: Text,
    video: Video,
    videoembed: Videoembed,
  },
});