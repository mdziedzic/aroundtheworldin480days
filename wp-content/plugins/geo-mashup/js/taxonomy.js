jQuery.extend(GeoMashup,{term_manager:(function(){var d=jQuery,c={},e={},k,g={},j=[];function a(l,o,n){var m=null;if(typeof n==="undefined"){m=a(l,o,document);if(!m&&GeoMashup.have_parent_access){m=a(l,o,parent.document)}}else{if(GeoMashup.opts.name){m=n.getElementById(GeoMashup.opts.name+"-"+l+"-"+o);if(!m){m=n.getElementById(GeoMashup.opts.name+"-"+o)}}if(!m){m=n.getElementById("gm-term-"+o)}if(!m&&"category"===l){if("legend"===o){m=n.getElementById("gm-cat-legend")}else{m=n.getElementById("gm-"+o)}}}return m}function h(m,q){var p,n,l,r,o=k[m];if(q){q=String(q);p={};n=0;d.each(o.terms,function(t,s){if(s.parent_id&&s.parent_id===q){p[t]=h(m,t);n+=1}});return(n>0)?p:null}else{g[m]={};d.each(o.terms,function(s,t){if(!t.parent_id){g[m][s]=h(m,s)}})}}function f(){d.each(e,function(l,m){d.each(m.terms,function(o,n){if(n.max_line_zoom>=0){GeoMashup.createTermLine(n)}})})}function b(l,n){var m=[];d.each(n.terms,function(r,q){var o,p=q;p.term_id=r;p.name=k[l].terms[r].name;if(k[l].terms[r].hasOwnProperty("order")){p.order=k[l].terms[r].order}else{p.order=p.name.toLowerCase()}m.push(p)});m.sort(function(p,o){return((p.order<o.order)?-1:((p.order>o.order)?1:0))});return m}function i(){d.each(e,function(m,r){var o,A,v,s,l,z,u,x,q,w,n,t,y,p=a(m,"legend");if(!p){return}z=d(p);if(z.hasClass("noninteractive")){w=false}else{if(typeof GeoMashup.opts.interactive_legend==="undefined"){w=true}else{w=GeoMashup.opts.interactive_legend}}if(z.hasClass("check-all-off")){y=false}else{if(w){n=true}}if(z.hasClass("default-off")){y=true}else{y=false}q=/format-(\w+)/.exec(z.attr("class"));if(q){x=q[1]}else{if(GeoMashup.opts.legend_format){x=GeoMashup.opts.legend_format}else{x="table"}}if(x==="dl"){A="dl";v="";s="dt";l="dd"}else{if(x==="ul"){A="ul";v="li";s="span";l="span"}else{A="table";v="tr";s="td";l="td"}}if(z.hasClass("titles-on")||(!z.hasClass("titles-off")&&GeoMashup.opts.include_taxonomies.length>1)){u=d("<h2></h2>").addClass("gm-legend-title").addClass(m+"-legend-title").text(k[m].label);GeoMashup.doAction("taxonomyLegendTitle",u,m);z.append(u)}o=d("<"+A+' class="gm-legend '+m+'" />');GeoMashup.doAction("taxonomyLegend",o,m);if(GeoMashup.opts.name&&n){t=d("<label></label>").text(GeoMashup.opts.check_all_label).attr("for","gm-"+m+"-check-all").prepend(d('<input type="checkbox" />').attr("id","gm-"+m+"-check-all").attr("checked",(y?false:"checked")).change(function(){if(d(this).is(":checked")){o.find("input.gm-"+m+"-checkbox:not(:checked)").click()}else{o.find("input.gm-"+m+"-checkbox:checked").click()}}));if(v){o.append(d("<"+v+"/>").append(d("<"+s+"/>")).append(d("<"+l+"/>").append(t)))}else{o.append(d("<"+s+"/>")).append(d("<"+l+"/>").append(t))}}d.each(b(m,r),function(G,E){var F,C,B,K,H,J,I,D;F=E.term_id;B=E.name;if(GeoMashup.opts.name&&w){C="gm-"+m+"-checkbox-"+F;D=d('<input type="checkbox" name="term_checkbox" />').attr("id",C).addClass("gm-"+m+"-checkbox").change(function(){GeoMashup.term_manager.setTermVisibility(F,m,d(this).is(":checked"))});if(y){GeoMashup.term_manager.setTermVisibility(F,m,false)}else{D.attr("checked","checked")}I=d("<label/>").attr("for",C).text(B).prepend(D)}else{I=d("<span/>").text(B)}H=d("<"+s+' class="symbol"/>').append(d("<img/>").attr("src",E.icon.image).attr("alt",F).click(function(){I.click();return false}));J=d("<"+l+' class="term"/>').append(I);GeoMashup.doAction("taxonomyLegendEntry",H,J,m,F);if(v){K=d("<"+v+"/>").addClass("term-"+F).append(H).append(J);GeoMashup.doAction("taxonomyLegendRow",K,m,F);o.append(K)}else{o.append(H).append(J)}});d(p).append(o)})}c.load=function(){k=GeoMashup.opts.term_properties;if(!k){return}d.each(k,function(l){h(l)})};c.extendTerm=function(s,l,o,n){var t,q,p,m,r;o=String(o);if(!e.hasOwnProperty(l)){e[l]={terms:{},term_count:0}}t=e[l];if(!t.terms.hasOwnProperty(o)){if(k[l].terms[o].color){m=k[l].terms[o].color}else{m=GeoMashup.color_names[t.term_count%GeoMashup.color_names.length]}p=GeoMashup.colors[m];if(typeof customGeoMashupCategoryIcon==="function"){q=customGeoMashupCategoryIcon(GeoMashup.opts,[o])}if(!q&&typeof customGeoMashupColorIcon==="function"){q=customGeoMashupColorIcon(GeoMashup.opts,m)}if(!q){q=GeoMashup.colorIcon(m)}if("category"===l){GeoMashup.doAction("categoryIcon",GeoMashup.opts,q,o)}GeoMashup.doAction("termIcon",q,l,o);GeoMashup.doAction("colorIcon",GeoMashup.opts,q,m);r=-1;if(k[l].terms[o].line_zoom){r=k[l].terms[o].line_zoom}t.terms[o]={icon:q,points:[s],objects:[n],color:p,visible:true,max_line_zoom:r};t.term_count+=1}else{t.terms[o].points.push(s);t.terms[o].objects.push(n)}};c.reset=function(){d.each(e,function(l,m){d.each(m.terms,function(o,n){n.points.length=0;if(n.line){GeoMashup.hideLine(n.line)}})})};c.getTermData=function(l,n,m){return e[l].terms[n][m]};c.searchTermHierarchy=function(m,n){var l,o;if(!n){n=g.category}else{if(typeof n==="string"){n=g[n]}}for(o in n){if(n.hasOwnProperty(o)&&typeof n[o]!=="function"){if(o===m){return n[o]}else{if(n[o]){l=c.searchTermHierarchy(m,n[o]);if(l){return l}}}}}return null};c.populateTermElements=function(){f();i();c.tabbed_index.create()};c.tabbed_index=(function(){var q={},n=[],o,t,s,p;function r(w,u,v){var x;if(e[u].terms[w]){return true}for(x in v){if(v.hasOwnProperty(x)&&r(x,u,v[x])){return true}}return false}function m(z,u,v,y){var A,B,C,x,w=u.replace("category","cat");if(typeof y==="undefined"){y=true}A=d("<div></div>").attr("id",q.getTermIndexId(z,u)).addClass("gm-tabs-panel").addClass("gm-tabs-panel-"+z);if(y){A.addClass("gm-hidden")}B=d("<ul></ul>").addClass("gm-index-posts");if(e[u].terms[z]){e[u].terms[z].objects.sort(function(E,D){var G=E.title,F=D.title;if(G===F){return 0}else{return G<F?-1:1}});d.each(e[u].terms[z].objects,function(E,D){B.append(d("<li></li>").append(d("<a></a>").attr("href","#"+GeoMashup.opts.name).text(D.title).click(function(){GeoMashup.clickObjectMarker(D.object_id)})))})}if(v){x=0;C=d("<ul></ul>").addClass("gm-sub-"+w+"-index");d.each(v,function(G,D){var F=d("<li></li>"),E=e[u].terms[G];if(E){F.append(d("<img />").attr("src",E.icon.image)).append(d("<span></span>").addClass("gm-sub-"+w+"-title").text(E.name))}F.append(m(G,u,D,false));x+=1;if(t&&x%t===0){B.append(C);C=d("<ul></ul>").addClass("gm-sub-"+w+"-index")}});B.append(C)}A.append(B);return A}function l(w,u){var v;p=d("<div></div>").attr("id",GeoMashup.opts.name+"-tab-index");v=d('<ul class="gm-tabs-nav"></ul>');d.each(w,function(y,x){if(r(y,u,x)){n.push(y)}});n.sort(function(y,x){var A=k[u].terms[y].name,z=k[u].terms[x].name;if(A===z){return 0}else{return A<z?-1:1}});d.each(n,function(y,A){var x=w[A],B=d("<li></li>").addClass("gm-tab-inactive").addClass("gm-tab-inactive-"+A),z=d("<a></a>").attr("href","#"+GeoMashup.opts.name).click(function(){q.selectTab(A,u);return false});if(e[u]&&e[u].terms[A]){z.append(d("<img />").attr("src",e[u].terms[A].icon.image))}z.append(d("<span></span>").text(k[u].terms[A].name));B.append(z);v.append(B);if(!s){c.setHierarchyVisibility(A,x,u,false)}});p.append(v);d.each(w,function(y,x){p.append(m(y,u,x))});return p}q.getTermIndexId=function(w,u){var v=u.replace("category","cat");return"gm-"+v+"-index-"+w};q.create=function(){var x,w,z,v,y=false,u=[];d.each(e,function(A){var B=a(A,"tabbed-index");if(B){v=A;u=d(B);return true}});if(u.length===0){return}o=g[v];w=/start-tab-term-(\d+)/.exec(u.attr("class"));if(w){x=w[1]}else{if("category"===v){x=GeoMashup.opts.start_tab_category_id}}z=/tab-index-group-size-(\d+)/.exec(u.attr("class"));if(z){t=z[1]}else{t=GeoMashup.opts.tab_index_group_size}if(u.hasClass("show-inactive-tab-markers")){s=true}else{s=GeoMashup.opts.show_inactive_tab_markers}if(u.hasClass("disable-tab-auto-select")){y=true}else{if("category"===v){y=GeoMashup.opts.disable_tab_auto_select}}if(x){o=c.searchTermHierarchy(x,o)}u.append(l(o,v));if(!y){d.each(n,function(A,B){if(r(B,v,o)){q.selectTab(B,v);return false}})}};q.selectTab=function(z,v){var u,x,y,w;if(!p){return false}if(p.find(".gm-tab-active-"+z).length>0){return true}u=p.find(".gm-tabs-nav .gm-tab-active");if(u.length>0){y=/gm-tab-active-(\d+)/.exec(u.attr("class"));if(y){w=y[1];u.attr("class","gm-tab-inactive gm-tab-inactive-"+w)}}p.find(".gm-tabs-nav .gm-tab-inactive-"+z).attr("class","gm-tab-active gm-tab-active-"+z);p.find(".gm-tabs-panel.gm-active").removeClass("gm-active").addClass("gm-hidden");p.find(".gm-tabs-panel-"+z).removeClass("gm-hidden").addClass("gm-active");if(!s){if(w){c.setHierarchyVisibility(w,o[w],v,false)}c.setHierarchyVisibility(z,o[z],v,true)}};return q}());c.setTermVisibility=function(n,l,o){var m;if(!e[l]||!e[l].terms[n]){return false}m=e[l].terms[n];if(GeoMashup.map.closeInfoWindow){GeoMashup.map.closeInfoWindow()}if(m.line){if(o&&GeoMashup.map.getZoom()<=m.max_line_zoom){GeoMashup.showLine(m.line)}else{GeoMashup.hideLine(m.line)}}e[l].terms[n].visible=o;d.each(e[l].terms[n].points,function(q,p){GeoMashup.updateMarkerVisibility(GeoMashup.locations[p].marker)});GeoMashup.recluster();GeoMashup.updateVisibleList();return true};c.getTermName=function(l,m){return k[l].terms[m].name};c.isTermAncestor=function(n,m,l){if(!k[l]){return false}n=n.toString();m=m.toString();if(k[l].terms[m].parent_id){if(k[l].terms[m].parent_id===n){return true}else{return c.isTermAncestor(n,k[l].terms[m].parent_id,l)}}else{return false}};c.updateLineZoom=function(l,m){d.each(e,function(n,o){d.each(o.terms,function(q,p){if(p.visible&&p.line){if(l<=p.max_line_zoom&&m>p.max_line_zoom){GeoMashup.hideLine(p.line)}else{if(l>p.max_line_zoom&&m<=p.max_line_zoom){GeoMashup.showLine(p.line)}}}})})};c.setHierarchyVisibility=function(n,m,l,o){c.setTermVisibility(n,l,o);m=m||{};d.each(m,function(q,p){c.setHierarchyVisibility(q,p,l,o)})};return c}()),isCategoryAncestor:function(b,a){return this.term_manager.isTermAncestor(b,a,"category")},hideCategory:function(a){GeoMashup.term_manager.setTermVisibility(a,"category",false)},showCategory:function(a){GeoMashup.term_manager.setTermVisibility(a,"category",true)},hideCategoryHierarchy:function(b){var a=GeoMashup.term_manager.searchTermHierarchy(b,"category");GeoMashup.term_manager.setHierarchyVisibility(b,a,"category",false)},showCategoryHierarchy:function(b){var a=GeoMashup.term_manager.searchTermHierarchy(b,"category");GeoMashup.term_manager.setHierarchyVisibility(b,a,"category",true)},categoryTabSelect:function(a){this.term_manager.tabbed_index.selectTab(a,"category")},categoryIndexId:function(a){return"gm-cat-index-"+a},createTermLine:function(a){}});