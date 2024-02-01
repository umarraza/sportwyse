import{d as u,M as v,o as c,e as i,a as e,F as k,i as P,b as g,u as r,t as S,p as C,A as V,k as x,n as A,O as M}from"./app-52cb912a.js";import{s as $}from"./vue-multiselect.esm-fa9f37db.js";const q=["aria-labelledby"],O={class:"modal-dialog modal-lg"},D={class:"modal-content"},U={class:"modal-header"},j=["id"],w=e("button",{type:"button",class:"modal-close-btn close","data-dismiss":"modal","aria-label":"Close"},[e("span",{"aria-hidden":"true"},"×")],-1),B={class:"modal-body"},F={class:"col-md-1",style:{padding:"38px 0px 0px 15px !important"}},L=["onClick"],N={class:"col-md-5"},z={class:"form-group"},G=e("label",{class:"col-form-label"},"Name",-1),E={class:"txt-danger"},H={class:"col-md-5"},I={class:"form-group"},J=e("label",{class:"col-form-label"},"Status",-1),K=["onUpdate:modelValue"],Q=e("option",{value:"Primary"},"Primary",-1),R=e("option",{value:"Guest"},"Guest",-1),T=[Q,R],W={class:"modal-footer"},X=e("button",{type:"button",class:"btn btn-secondary","data-dismiss":"modal"},"Close",-1),Y=["onClick"],se={__name:"AddPlayer",props:{team:{type:Object,required:!0},players:{type:Object,required:!0},errors:{type:Object,required:!1}},setup(o){const n=o;let t=u([]).value;const m=n.players.map(s=>({id:s.id,name:s.name})),p=u({id:"",status:"Primary"});v(()=>{t.push(p.value)});const _=()=>{t.push({id:"",status:"Primary"})},y=s=>{if(t.length===1){alert("Atleast one player is required!");return}t.splice(s,1)},b=s=>{t.filter(a=>a.id===s.id).length>1&&(alert("Duplicate player selected!"),t.pop())},h=()=>{M.post(route("staff.teams.add-player",n.team.id),{players:t.map(s=>({id:s.id.id,status:s.status}))},{onSuccess:()=>{document.querySelector(".modal-close-btn").click()}})};return(s,f)=>(c(),i("div",{class:A(["modal fade",`addPlayers${o.team.id}`]),tabindex:"-1",role:"dialog","aria-labelledby":`addPlayers${o.team.id}Label`,"aria-hidden":"true"},[e("div",O,[e("div",D,[e("div",U,[e("h5",{class:"modal-title mt-0",id:`addPlayers${o.team.id}Label`},"Add Players",8,j),w]),e("div",B,[(c(!0),i(k,null,P(r(t),(a,d)=>(c(),i("div",{class:"row",key:d},[e("div",F,[e("i",{class:"fas fa-minus-circle",onClick:l=>y(d),style:{"font-size":"25px",color:"#ff005a9c",cursor:"pointer"}},null,8,L)]),e("div",N,[e("div",z,[G,g(r($),{modelValue:a.id,"onUpdate:modelValue":l=>a.id=l,onSelect:l=>b(a),options:r(m),"close-on-select":!0,"clear-on-select":!1,placeholder:"Select one",label:"name","track-by":"name"},null,8,["modelValue","onUpdate:modelValue","onSelect","options"]),e("div",E,S(o.errors[`players.${d}.id`]),1)])]),e("div",H,[e("div",I,[J,C(e("select",{class:"custom-select","onUpdate:modelValue":l=>a.status=l},T,8,K),[[V,a.status]])])])]))),128))]),e("div",W,[X,e("button",{type:"button",class:"btn btn-primary",onClick:_},"Add More"),e("button",{type:"button",class:"btn btn-success",onClick:x(h,["prevent"])},"Submit",8,Y)])])])],10,q))}};export{se as default};