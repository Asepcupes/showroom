import{d,a as m,B as p,r as e,ae as f,af as g,l as h,o as B,b as _,f as b,g as k,e as x,S as a}from"./main.98bb6b88.js";import{_ as w}from"./Table.vue_vue_type_style_index_0_lang.acb9e081.js";import"./vue3-datatable.4641d896.js";import"./transition.2d1b6864.js";import"./dom.963c6c8c.js";import"./micro-task.83c33f57.js";import"./open-closed.49c0aaa2.js";const y=x("div",{style:{height:"70vh"}},null,-1),$=d({__name:"SettingIndex",setup(v){m();const o=p("axios");e({});const s=e(null);f.users(),g({title:"Pengaturan"});const l=e([{field:"id",title:"ID",sort:!1},{field:"name",title:"Name",sort:!1},{field:"value",title:"Nilai",sort:!1},{field:"actions",title:"Aksi",slot:!0,sort:!1}])||[],r=e([{type:"editIcon",to:({value:t})=>`/admin/setting/edit/${t.id}`},{type:"deleteIcon",click:({value:t})=>{const n=a.mixin({customClass:{popup:"sweet-alerts",confirmButton:"btn btn-danger",cancelButton:"btn btn-dark ltr:mr-3 rtl:ml-3"},buttonsStyling:!1}),c=a.mixin({toast:!0,position:"bottom-right",showConfirmButton:!1,customClass:{popup:"color-success"},timer:2e3,showCloseButton:!0});n.fire({title:"Hapus data?",text:"Apakah kamu yakin untuk menghapus data ini, Data yang dihapus dapat mempengaruhi fungsi pada Aplikasi Mobile !",icon:"warning",showCancelButton:!0,confirmButtonText:"Hapus",cancelButtonText:"Batal",reverseButtons:!0,padding:"2em"}).then(i=>{i.value?o.delete(`/admin/settings/${t.id}`).then(D=>{c.fire("Data berhasil dihapus."),s.value.getData()}):(i.dismiss,a.DismissReason.cancel)})}}]),u=async()=>{};return h(async()=>{await u()}),(t,n)=>(B(),_("div",null,[b(w,{url:"/admin/settings/index",cols:k(l),addName:"Tambah",addRoute:"/admin/setting/form",actions:r.value,title:"Daftar Pengaturan",dropdownAction:!1,searching:!0,ref_key:"datatable",ref:s},null,8,["cols","actions"]),y]))}});export{$ as default};
