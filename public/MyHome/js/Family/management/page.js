
function getShowArr(curNum,visiblePageNumsLength,totalPages){
	
	var limitArr=[...Array(visiblePageNumsLength).keys()].map((num)=>{return num+1})
    var totalArr=[...Array(totalPages).keys()].map((num)=>{return num+1})

	if(totalPages<=visiblePageNumsLength){
		return totalArr
	}else{
		
		var left=Math.floor((visiblePageNumsLength-1)/2)
		var right=Math.ceil((visiblePageNumsLength-1)/2)
		
		let start=curNum-0-left
		let end=(curNum-0)+right
		
		if(start<1){
			start=1
		}
		
		if(end>totalPages){
		   end=	totalPages
		}
		
		while(end-start+1!=visiblePageNumsLength){
			if(end==totalPages){
				start--
			}
			if(start==1){
				end++
			}
		}
		
		var res=[]
		
		for(var i=start;i<=end;i++){
			res.push(i)
		}
        
		
		
		if(res[0]>1){
			res[0]='···'
		}
	    
		if(res[res.length-1]<totalPages){
			res[res.length-1]='···'
		}
		
		return res
	}
}