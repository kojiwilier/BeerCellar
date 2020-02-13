/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


/*  画像プレビュー */
$('form').on('change', 'input[name="pic1"]', event => {
    const file = event.target.files[0],
          reader = new FileReader(),
          $preview = $('.preview1'); // 表示する所
    console.log(event.target);

    // 画像ファイル以外は処理停止
    if(file.type.indexOf("image") < 0){
      return false;
    }

    let blobUrl = window.URL.createObjectURL(file)
    console.log(blobUrl);
    // ファイル読み込みが完了した際に発火するイベントを登録
    reader.onload = function() {
        // .prevewの領域の中にロードした画像を表示
        $preview.attr('src',blobUrl);

    };

    reader.readAsDataURL(file);
});


$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

/*　my beerボタンを押した時にajax  cellarに登録 */

$(function(){
    $('.buy').on('click',function(){
        var clickElm =$(this);
        var beerid = clickElm.attr('data-beer-id');

        $.ajax({
            url:'mybeer/regist/'+beerid,
            method: 'POST',
        })
        .done(function(){
            alert('登録完了！');

        })
        .fail(function(){
            alert('error!')
        });
    })
})
