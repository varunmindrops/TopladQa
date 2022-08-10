<script>
export default {
  name: "FileUpload",
  props: {
    imageUrl: {
      type: String,
      default: ""
    },
    type: {
      type: String,
      default: "image" // file
    },
    folderName: {
      type: String,
      default: ""
    },
    field: {
      type: String,
      default: ""
    },
    attribute: {
      type: String,
      default: ""
    },
    showButton: {
      type: Boolean,
      default: false
    },
    accept: {
      type: String,
      default: ""
    },
    disable: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {
      url: "",
      APP_URL: process.env.MIX_APP_URL,
      dialogUrl: "",
      previewImage: false
    };
  },
  created () {
    if (this.imageUrl) {
      this.url = `${this.APP_URL}/${this.imageUrl}`;
    }
  },
  watch: {
    imageUrl (newUrl) {
      if (newUrl) {
        this.url = `${this.APP_URL}/${this.imageUrl}`;
      } else {
        this.url = '';
      }
    }
  },
  methods: {
    async upload (file) {
      try {
        // console.log(file, "asdasdsadsa");
        // this.dialogUrl = file.url;

        if (this.showButton) {
          return this.$emit("save", file);
        }
        const { data } = await this.$http.uploadFile(
          "image-upload",
          file.raw,
          this.folderName,
          this.field
        );

        this.url = `${this.APP_URL}/${data.path}`;
        this.$emit("save", {
          fileUrl: data.path,
          fileName: file.name,
          fileType: file.raw.type
        });
        this.$store.dispatch("loader/updateLoader", false);
        // this.$utility.showSucessMessage("Image successfully uploded.");
      } catch (err) {
        console.log(err);
        this.$utility.showErrorMessage(err.message);

      }

    },
    async upload1 (file) {
      try {
        console.log(file, "asdasdsadsa");

        if (!this.showButton) {
          return this.$emit("save", file);
        }
        const { data } = await this.$http.uploadFile(
          "image-upload",
          file,
          this.folderName,
          this.field
        );

        this.url = `${this.APP_URL}/${data.path}`;
        this.$emit("save", {
          fileUrl: data.path,
          fileName: file.name,
          fileType: file.type
        });
        this.$store.dispatch("loader/updateLoader", false);
      } catch (err) {
        console.log(err);
        this.$utility.showErrorMessage(err.message);

      }
    },
    beforeUpload (file) {
      const fileType = file.type;
      // console.log(this.accept);
      // if (
      //     fileType !== "image/png" ||
      //     fileType !== "image/jpg" ||
      //     fileType !== "image/jpeg" ||
      //     fileType !== "application/pdf"
      // ) {
      //     return this.$utility.showErrorMessage(
      //         "file format not supported."
      //     );
      // }
    }
  }
};
</script>

<template lang="pug">
div
    span(v-if="!showButton")
        div
            el-upload.avatar-uploader(
                action=""
                :on-change="upload"
                :show-file-list="false"
                :before-upload="beforeUpload"
                :accept="accept"
            )
                img.avatar(v-if="url" :src="url" alt="Image Not Found")
                i.el-icon-plus.avatar-uploader-icon(v-else)
        //- div
            el-upload(
                action="",
                :on-change="upload",
                :show-file-list="false"
            )
                el-button(size="small" type="primary") {{ attribute | humanize}}

    span(v-if="showButton")
        el-button.btn.btn-primary(@click="$refs.uploded_file.click()", :disabled="disable") {{ attribute | humanize}}
        input(
            type="file"
            style="display: none"
            @change="upload1($event.target.files[0])",
            ref="uploded_file",
            :accept="accept"
            :disabled="disable"
        )
</template>

// formData.append('file', file[0]); // formData.append('api_key',
this.$constant.COUDINARY_API_KEY); // formData.append('use_filename', true); //
formData.append('timestamp', Date.now()); // formData.append('signature',
'9c3d531a1cf3539d7bfa2da529fbac560e3a61de'); // formData.append('public_id',
file[0].name); // formData.append('moderation', 'metascan');

<style lang="scss" scoped>
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>
