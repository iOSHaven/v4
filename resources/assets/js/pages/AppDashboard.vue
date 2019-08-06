<template>
  

<section>
    <div class="container">
      <div class="row">
          <div class="col-tablet-portrait-3 px-3">
            <div class="bg-white">
                <image-input
                  :width="80"
                  :height="80"
                  :src="application.icon"
                  class="d-block b-1 b-light"
                ></image-input>
                <strong class="my-2 d-block">{{ application.name || "No name" }}</strong>
                <div>
                  <div class="py-1 flex-lc">
                    <i class="fad fa-eye mr-2 text-center" style="width: 20px;"></i>
                    {{ application.views_str || "0" }}
                  </div>
                  <div class="py-1 flex-lc">
                    <i class="fad fa-download mr-2 text-center" style="width: 20px;"></i>
                    {{ application.downloads_str || "0" }}
                  </div>
                  <div class="py-1 flex-lc">
                    <i class="fas fa-database mr-2 text-center" style="width: 20px;"></i>
                    {{ application.size | format_size }}
                  </div>
                  <div class="py-1 flex-lc">
                    <i class="fad fa-history mr-2 text-center" style="width: 20px;"></i>
                    v{{ application.version || "0.0.1" }}
                  </div>
                </div>
                
  
                <ul class="nav-vert">
                  
                  <li :class="[page == 'Information' ? 'bl-3 b-blue pl-3' : '']">
                    <a href="#" @click.prevent="goto('Information')">Information</a>
                  </li>
                  <li :class="[page == 'Description' ? 'bl-3 b-blue pl-3' : '']">
                    <a href="#" @click.prevent="goto('Description')">Description</a>
                  </li>
                  <li :class="[page == 'Images' ? 'bl-3 b-blue pl-3' : '']">
                    <a href="#" @click.prevent="goto('Images')">Images</a>
                  </li>
                  <li :class="[page == 'Mirrors' ? 'bl-3 b-blue pl-3' : '']">
                    <a href="#" @click.prevent="goto('Mirrors')">Mirrors</a>
                  </li>
                  <li>
                    <a href="#" class="text-red">Delete app</a>
                  </li>
                  
                </ul>
            </div>
          </div>
          <div class="col-tablet-portrait-9">
              <div class="p-3 bg-white">
                <div class="flex-sbc mb-3">
                  <h6 class="m-0">{{ page }}</h6>
                  <button class="btn btn-blue py-2 px-3">
                    <small>
                      <i class="fad fa-save mr-2"></i>
                      Save app
                    </small>
                  </button>
                </div>

                <app-information v-if="page == 'Information'"></app-information>
                <app-description v-if="page == 'Description'"></app-description>
                <app-images v-if="page == 'Images'"></app-images>
              </div>
          </div>
      </div>
      
    </div>
  </section>


</template>

<script>

import {mapFields} from 'vuex-map-fields';
import ImageInput from "../components/ImageInput";
import AppInformation from "./AppInformation";
import AppDescription from "./AppDescription";
import AppImages from "./AppImages";
import axios from "axios";

export default {
  name: "AppDashboard",
  components: {
    AppInformation,
    AppDescription,
    AppImages,
    ImageInput
  },
  props: {
    "uid": String
  },
  computed: {
    ...mapFields([
      'application'
    ])
  },
  data () {
    return {
      page: 'Information',
    }
  },
  mounted () {
    this.page = window.location.hash.slice(1) || "Information"
    axios.get(`/apps/getJson/${this.uid}`)
    .then(res => {
      this.application = res.data
    })
  },
  methods: {
    goto (p) {
      this.page=p
      window.location.hash = p
    }
  },
  filters: {
    format_size($number) {
      if (!$number) return '0b';
      if ($number > 999999999999999999) return ($number / 1000000000000000000).toFixed(1) + 'eb';
      else if ($number > 999999999999999) return ($number / 1000000000000000).toFixed(1) + 'pb';
      else if ($number > 999999999999) return ($number / 1000000000000).toFixed(1) + 'tb';
      else if ($number > 999999999) return ($number / 1000000000).toFixed(1) + 'gb';
      else if ($number > 999999) return ($number / 1000000).toFixed(1) + 'mb';
      else if ($number > 999) return ($number / 1000).toFixed(1) + 'kb';
      else return $number + 'b';
    }
  }
}
</script>
