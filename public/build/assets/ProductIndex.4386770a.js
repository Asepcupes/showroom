/* empty css                         */import{y as i,s as d,r as t,A as o,a as c,i as u,k as f,H as p,o as g,d as _,C as h,q as y,e as P}from"./main.67d9ac72.js";import{g as k}from"./global-components.27092f7d.js";import{_ as v}from"./Table.vue_vue_type_style_index_0_lang.2aedec19.js";import"./vue3-datatable.0dc09905.js";import"./transition.a2e5a33a.js";import"./dom.a52a1868.js";import"./micro-task.00f61f88.js";import"./open-closed.dfa76aa7.js";const x=P("div",{style:{height:"70vh"}},null,-1),S=i({__name:"ProductIndex",setup(C){d("axios"),t({});const s=t(null);o.users(),c({title:"Produk"});const l=t([{field:"id",title:"ID",sort:!0},{field:"name",title:"Product Name",sort:!0},{field:"category_id",title:"Category",sort:!0,cellRenderer:e=>{var r;return((r=e==null?void 0:e.category)==null?void 0:r.name)||"-"}},{field:"price",title:"Price",sort:!0,cellRenderer:e=>k.formatPrice(e.price)},{field:"stock",title:"Stock",sort:!0},{field:"discount",title:"Discount",sort:!0,cellRenderer:e=>e!=null&&e.discount?(e==null?void 0:e.discount)+"%":"-"},{field:"unit",title:"Unit",sort:!0},{field:"weight",title:"Weight",sort:!0,cellRenderer:e=>e!=null&&e.weight?(e==null?void 0:e.weight)+" g":"-"},{field:"actions",title:"Actions",slot:!0,sort:!1}])||[],a=t([{type:"previewIcon",to:({value:e})=>`/admin/product/detail/${e.id}`}]);let n=t(null);return u(n,(e,r)=>{e==null&&s.value.getData()}),t(["Pending","Paid","Completed","ProcessedBySeller","Shipped","Delivered","ExpiredPayment","Cancelled"]),f({}),p(async()=>{o.isAuthenticated()&&o.getToken()!=!1}),(e,r)=>(g(),_("div",null,[h(v,{url:"/admin/products/index",cols:y(l),actions:a.value,title:"Daftar Produk",dropdownAction:!1,searching:!0,ref_key:"datatable",ref:s},null,8,["cols","actions"]),x]))}});export{S as default};