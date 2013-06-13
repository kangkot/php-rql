<?php namespace r;

class Pluck extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $attributes) {
        if (is_string($attributes))
            $attributes = array($attributes);
        if (!is_array($attributes)) throw new RqlDriverError("Attributes must be an array or a single attribute.");        
        // Check keys and convert strings
        foreach ($attributes as &$val) {
            $val = new StringDatum($val);
            unset($val);
        }
        
        $this->setPositionalArg(0, $sequence);
        $i = 1;
        foreach ($attributes as $val) {
            $this->setPositionalArg($i++, $val);
        }
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_PLUCK;
    }
}

class Without extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $attributes) {
        if (is_string($attributes))
            $attributes = array($attributes);
        if (!is_array($attributes)) throw new RqlDriverError("Attributes must be an array or a single attribute.");        
        // Check keys and convert strings
        foreach ($attributes as &$val) {
            $val = new StringDatum($val);
            unset($val);
        }
        
        $this->setPositionalArg(0, $sequence);
        $i = 1;
        foreach ($attributes as $val) {
            $this->setPositionalArg($i++, $val);
        }
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_WITHOUT;
    }
}

class Merge extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $other) {
        if (!(is_object($other) && is_subclass_of($other, "\\r\\Query")))
            $other = nativeToDatum($other);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $other);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_MERGE;
    }
}

class Append extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $value) {
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_APPEND;
    }
}

class Prepend extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $value) {
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_PREPEND;
    }
}

class Difference extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $value) {
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_DIFFERENCE;
    }
}

class SetInsert extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $value) {
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_SET_INSERT;
    }
}

class SetIntersection extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $value) {
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_SET_INTERSECTION;
    }
}

class SetDifference extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $value) {
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_SET_DIFFERENCE;
    }
}

class SetUnion extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $value) {
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_SET_UNION;
    }
}

class Getattr extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $attribute) {
        if (!(is_object($attribute) && is_subclass_of($attribute, "\\r\\Query")))
            $attribute = new StringDatum($attribute);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $attribute);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_GETATTR;
    }
}

class HasFields extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $attributes) {
        if (is_string($attributes))
            $attributes = array($attributes);
        if (!is_array($attributes)) throw new RqlDriverError("Attributes must be an array or a single attribute.");        
        // Check keys and convert strings
        foreach ($attributes as &$val) {
            $val = new StringDatum($val);
            unset($val);
        }
        
        $this->setPositionalArg(0, $sequence);
        $i = 1;
        foreach ($attributes as $val) {
            $this->setPositionalArg($i++, $val);
        }
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_HAS_FIELDS;
    }
}

class InsertAt extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $index, $value) {
        if (!(is_object($index) && is_subclass_of($index, "\\r\\Query")))
            $index = new NumberDatum($index);
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $index);
        $this->setPositionalArg(2, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_INSERT_AT;
    }
}

class SpliceAt extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $index, $value) {
        if (!(is_object($index) && is_subclass_of($index, "\\r\\Query")))
            $index = new NumberDatum($index);
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $index);
        $this->setPositionalArg(2, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_SPLICE_AT;
    }
}

class DeleteAt extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $index, $endIndex = null) {
        if (!(is_object($index) && is_subclass_of($index, "\\r\\Query")))
            $index = new NumberDatum($index);
        if (isset($endIndex) && !(is_object($endIndex) && is_subclass_of($endIndex, "\\r\\Query")))
            $endIndex = new NumberDatum($endIndex);
        
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $index);
        if (isset($endIndex))
            $this->setPositionalArg(2, $endIndex);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_DELETE_AT;
    }
}

class ChangeAt extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence, $index, $value) {
        if (!(is_object($index) && is_subclass_of($index, "\\r\\Query")))
            $index = new NumberDatum($index);
        if (!(is_object($value) && is_subclass_of($value, "\\r\\Query")))
            $value = nativeToDatum($value);
        
        $this->setPositionalArg(0, $sequence);
        $this->setPositionalArg(1, $index);
        $this->setPositionalArg(2, $value);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_CHANGE_AT;
    }
}

class Keys extends ValuedQuery
{
    public function __construct(ValuedQuery $sequence) {
        $this->setPositionalArg(0, $sequence);
    }
    
    protected function getTermType() {
        return pb\Term_TermType::PB_KEYS;
    }
}


?>
