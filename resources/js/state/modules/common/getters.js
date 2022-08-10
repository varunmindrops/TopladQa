function getParsedClassExams(state) {
    if(state.classExams && !state.classExams.length) return [];

    const data = [{ id: null, text : 'Add Class',  type: 'class', "opened": false }];

    for(const cls of state.classExams) {
        const item = { id: cls.id, description : cls.description, text : cls.name, type: 'class', "opened": false,  children: [{ text : 'Add Subject',  type: 'subject', "opened": false }] };

        for(const subject of cls.subject) {
            const item2 = { text : subject.name, type: 'subject',  "opened": false, children: [{ text : 'Add Unit',  type: 'unit', "opened": false }]  };
            
            for(const unit of subject.unit) {
                const item3 = { text : unit.name, type: 'unit', "opened": false, children: [{ text : 'Add Chapter',  type: 'chapter', "opened": false }]  };

                for(const chapter of unit.chapter) {
                    const item4 = { text : chapter.name, type: 'chapter', "opened": false, children: [{ text : 'Add Topic',  type: 'topic', "opened": false }]   };

                    for(const topic of chapter.topic) {
                        const item5 = { text : topic.name, type: 'topic', "opened": false, children: []  };

                        item4.children.push(item5);
                    }

                    item3.children.push(item4);
                }
                item2.children.push(item3);
            }
            item.children.push(item2);
        }
        data.push(item);
    }

    return data;
}

export default {
    // Spinner
    getLoader: state => state.isLoading,
    // class exams
    classExams: state => state.classExams,
    parsedClassExams: getParsedClassExams,
};
